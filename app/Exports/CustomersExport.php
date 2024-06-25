<?php

namespace App\Exports;

use App\Models\Customers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class CustomersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customers::all()->map(function ($customer) {
            return [
                'ID' => $customer->ID,
            'First Name' => $customer->fname,
            'Last Name' =>$customer->lname ,
            'Email'=> $customer->email,
            'Phone' => $customer->phone,
            'Address' =>$customer->address,
            'City' => $customer->city,
            'State' => $customer->state,
            'Pin Code' => $customer->pcode,
            'Customer Type' =>$customer->ctype,
            'Created_at'=> Carbon::parse($customer->created_at)->format('d/m/Y'),
            'Updated_at'=> Carbon::parse($customer->updated_at)->format('d/m/Y'),

                
            ];
        });
        // return Customers::all();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Address',
            'City',
            'State',
            'Pin Code',
            'Customer Type',
            'Created_at',
            'Updated_at',
            
        ];
    }
}