<?php

namespace App\Imports;

use App\Models\Customers;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Customers::create([
                'fname'=> $row[0],
                'lname' => $row[1],
                'phone' => $row[2],
                'email' => $row[3],
                'pcode' => $row[4],
                'address' => $row[5],
                'city' => $row[6],
                'state' => $row[7],
                'ctype' => $row[8]
            ]);
        }
    }
}