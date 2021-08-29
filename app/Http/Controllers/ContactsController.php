<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use App\Models\Contacts_Logs;
use App\Models\Csv_Files;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;
use App\Imports\BasicContact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Hash;
class ContactsController extends Controller
{
    //
    public function get()
    {
        $data = new Contacts();
        $id=Auth::user()->id;
        $query=$data::where('user_id',$id)->get();
        return Inertia::render('ContactsView',['datacsv'=>$query]);//Pagination

      //  return Inertia::render('ContactsView',['datacsv'=>$query->paginate(5)]);Do not know why does not work pagination!
    }

    public function import()

    //test purpose
    {   //Excel::import(new ContactsImport, 'jsalguero94@gmail.com/'.'contac1.csv','s3');
        $array = Excel::toArray(new BasicContact, 'jsalguero94@gmail.com/'.'contac1 - copia.csv','s3');
       // $array = (new BasicContact)->toArray('jsalguero94@gmail.com/'.'contac1 - copia.csv','s3');


        return $array;
    }

    public function validatefield(Request $req )
    {
        $file = new Csv_Files();
        $data = $file::find($req->idcsv);
        $array = Excel::toArray(new BasicContact, Auth::user()->email.'/'.$data->name,'s3');//get the data from s3 aws
      //  $array = (object) $array1;
      $object = json_decode(json_encode($array), FALSE);
        return Inertia::render('CsvView',['datacsv'=>$object,'showfiles'=>false,'showfile'=>true]);
    }

    public function todb(Request $req)
    {   $file = new Csv_Files();

        $logs = new Contacts_Logs();

        $data = $file::find($req->idcsv);
        $array = Excel::toArray(new BasicContact, Auth::user()->email.'/'.$data->name,'s3');//get the data from s3 aws
        $object = json_decode(json_encode($array), FALSE);
        $namef=$req->dataa['name'];
        $birth_datef=$req->dataa['birth_date'];
        $phonef=$req->dataa['phone'];
        $addressf=$req->dataa['address'];
        $creditf=$req->dataa['credit_card'];
        $emailf=$req->dataa['email'];
        $rowcount=count( $object[0]);
//TODO The variables above will be to change the correct fields,
//At last minute I have the idea to asign a number value in the select option


//*f means field
$i=1;
$flag=1;//to know if at least one contact passed the tests
$file::where('id',$req->idcsv)->update(['state'=>'Processing']); //change state to processing

        while($i<$rowcount)
        {

            $name=$object[0][$i][0];
            $birthday=$object[0][$i][1];
            $phone=$object[0][$i][2];
            $address=$object[0][$i][3];
            $credit=Hash::make($object[0][$i][4]);
            $four_numbers=substr( $object[0][$i][4],-4);
            $franchise=$this->franchise($object[0][$i][4]);
            $email=$object[0][$i][5];
            $user_id=Auth::user()->id;
            $csv_file_id=$req->idcsv;

            $contactsmodel= new Contacts();
            $logs = new Contacts_Logs();
            $email_duplicate=$contactsmodel::where('user_id',$user_id)->where('email',$email)->count();
            //check if the email exists for
           // the current user

           $logs->name = $name  ;
           $logs->birth_date=$birthday;
           $logs->phone=$phone;
           $logs->address=$address;
           $logs->credit_card=$credit; // Make encrypt
           $logs->four_numbers=$four_numbers;
           $logs->franchise=$franchise;
           $logs->email=$email;
           $logs->user_id=$user_id;
           $logs->csv_file_id=$csv_file_id;

           $contactsmodel->name = $name  ;
           $contactsmodel->birth_date=$birthday;
           $contactsmodel->phone=$phone;
           $contactsmodel->address=$address;
           $contactsmodel->credit_card=$credit; // Make encrypt
           $contactsmodel->four_numbers=$four_numbers;
           $contactsmodel->franchise=$franchise;
           $contactsmodel->email=$email;
           $contactsmodel->user_id=$user_id;
           $contactsmodel->csv_file_id=$csv_file_id;



            $validation = $this-> validations($name,$birthday,$phone,$email,$address);

            if($validation=="" && $email_duplicate<1)
            {
                //all tests passed
                $contactsmodel->save();
                $flag=0;//at least one contact passed the test

            }
            else
            {
                if($email_duplicate>=1)
                {
                    $validation = $validation.", duplicated email";
                }
                $logs->error_message=$validation;
                //one or more failures
                $logs->save();

            }


            $i++;
        }

        if($flag==1)
        {
            $file::where('id',$req->idcsv)->update(['state'=>'Failed','with_error'=>1]);
        }
        else
        {
            $file::where('id',$req->idcsv)->update(['state'=>'Finished']);
        }



        return "Done.";

        //return Inertia::render('CsvView',['datacsv'=>$file::where('user_id',Auth::user()->id)->get()]);
    }

    private function validations($name,$birthday,$phone1,$email1,$address1)
    {
        $message="Errors in ";
        $Forbidden = "#$%^&*()+=[]';,./{}|:<>?~";
        if(false !== strpbrk($name, $Forbidden))
        {
           $message=$message."name";
        }


        if( !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $birthday) )
        {
            $message=$message.", birthday";
        }

        $phone = trim($phone1);
        if( !preg_match("/^\(\+([0-9]{2})\)\s([0-9]{3})-?([0-9]{3})-?([0-9]{2})-?([0-9]{2})$/", $phone) )
        {
            $message=$message.", phone";
        }

        $email = trim($email1);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $message=$message.", email";
        }

        $address = trim($address1);
        if ( empty($address) )
        {
            $message=$message.", address";
        }

        if($message != "Errors in ")
        {
            return $message;
        }
        else{
            return "";
        }





    }

    private function franchise($number)
    {
        if( (str_starts_with($number, "34") || str_starts_with($number, "37")) && strlen($number) == 15 )
        {
            return "American Express";
        }
        if( str_starts_with($number, "300") && (strlen($number) >= 14 && strlen($number) <= 19 ) )
        {
            return "Diners Club International";
        }
        if( str_starts_with($number, "54") && strlen($number) == 16 )
        {
            return "Diners Club USA & CA";
        }

        $first_six = substr($number, 0, 6);
        $first_six = intval($first_six);
        $is_discover_candidate = false;
        if( ($first_six >= 622126  && $first_six <= 622925) )
        {
            $is_discover_candidate = true;
        }
        if(
            str_starts_with($number, "6011") || str_starts_with($number, "644") || str_starts_with($number, "645") ||
            str_starts_with($number, "646") || str_starts_with($number, "647") || str_starts_with($number, "648") ||
            str_starts_with($number, "649") || str_starts_with($number, "65")
        )
        {
            $is_discover_candidate = true;
        }

        if( $is_discover_candidate && ( strlen($number) >= 16 && strlen($number) <= 19 ) )
        {
            return "Discover Card";
        }
        $is_discover_candidate = false;

        $first_four = substr($number, 0, 4);
        $first_four = intval($first_four);
        if( ($first_four >= 3528 && $first_four <= 3589) && ( strlen($number) >= 16 && strlen($number) <= 19 ) )
        {
            return "JCB";
        }

        $first_two = substr($number, 0, 2);
        $first_two = intval($first_two);
        if( ($first_four >= 2221 && $first_four <= 2720) || ($first_two >= 51 && $first_two <= 55) )
        {
            if(count($number) == 16 )
            {
                return "Mastercard";
            }
        }

        if( str_starts_with($number, "4") && (strlen($number) >= 13 && strlen($number) <= 16 ) )
        {
            return "Visa";
        }

        return "Undefined";

    }


}
