<?php

namespace App\Imports;
use Illuminate\Support\Facades\Hash;
use App\Models\Contacts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
class BasicContact implements ToModel
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
            'credit_card' => $row[4],
            'email' => $row[5],

        ]);
    }
}
