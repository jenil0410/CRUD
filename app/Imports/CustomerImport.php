<?php

namespace App\Imports;

use App\Models\Customers;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Throwable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;


class CustomerImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    

     protected $errors = [];
     public function model(array $row)
    {
            return new Customers([
                'fname'   => $row['fname'],
                'lname'   => $row['lname'],
                'phone'   => $row['phone'],
                'email'   => $row['email'],
                'pcode'   => $row['pcode'],
                'address' => $row['address'],
                'city'    => $row['city'],
                'state'   => $row['state'],
                'ctype'   => $row['ctype'],
            ]);
            
        
    }

    
    public function rules(): array{
        return[
            '*.fname' => ['required','string'],
            '*.lname' => ['required','string'],
            '*.phone' => ['required','numeric','Digits:10'],
            '*.email' => ['required','email'],
            '*.pcode' => ['required'],
            '*.address' => ['required'],
            '*.city' => ['required'],
            '*.state' => ['required'],
            '*.ctype' => ['required']
        ];
    }

    
    
    
  

}