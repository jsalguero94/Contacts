<?php

namespace App\Imports;
use Illuminate\Support\Facades\Hash;
use App\Models\Contacts;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contacts([

            'name' => $row[0],
            'birth_date' => $row[1],
            'phone' => $row[2],
            'address' => $row[3],
            'credit_card' => Hash::make($row[4]),
            'four_numbers' => $row[5],
            'franchise' => $row[6],
            'email' => $row[7],
            'user_id' => $row[8],
            'csv_file_id' => $row[9],
        ]);
    }
}
