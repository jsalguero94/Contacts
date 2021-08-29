<?php

namespace App\Http\Controllers;
use App\Models\Csv_Files;
use ArrayObject;
use Aws\Api\Serializer\JsonBody;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Inertia\Inertia;

class Csv_FilesController extends Controller
{
    //
    public function save(Request $request)
    {

        try{
        $path = $request->file('file')->storeAs(Auth::user()->email, $request->name ,'s3');
        $save = new Csv_Files();
        //if the file exists, only make an update on the database (it will be update de updated_at field) and update the file in the S3 bucket
        if($save::where('name',$request->name)->count()==1)
        {
            $save::where('name',$request->name)->update(['name'=>$request->name]);

        }
        else{
            $save -> user_id =Auth::user()->id;
            $save -> name = $request->name;
            $save -> state = "On Hold";
            $save -> url = Storage::disk('s3')->url(basename($path));
            $save -> with_error = 0;
            $save->save();
        }
        return Inertia::render('CsvView',['datacsv'=>$save::where('user_id',Auth::user()->id)->get()]);
    }
    catch(Exception $e)
    {
        return $e;
    }
       //return "File Uploaded";
       return $save::where('user_id',Auth::user()->id)->get();
    }

    public function get()
    {
        $data = new Csv_Files();
//
        return Inertia::render('CsvView',['datacsv'=>$data::where('user_id',Auth::user()->id)->get()]);

    }
    public function load()
    {
        //Load csv to database test case
        $contents = Storage::disk('s3')->response('jsalguero94@gmail.com/'.'contac1.csv');//get the data from s3 aws

        // $data = array_map('str_getcsv', $contents);


        return $contents;
    }
}

