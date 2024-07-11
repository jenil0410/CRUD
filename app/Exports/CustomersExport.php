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
            'id' => $customer->id,
            'fname' => $customer->fname,
            'lname' =>$customer->lname ,
            'email'=> $customer->email,
            'phone' => $customer->phone,
            'address' =>$customer->address,
            'city' => $customer->city,
            'state' => $customer->state,
            'pcode' => $customer->pcode,
            'ctype' =>$customer->ctype,
            'Created_at'=> Carbon::parse($customer->created_at)->format('d/m/Y'),
            'Updated_at'=> Carbon::parse($customer->updated_at)->format('d/m/Y'),

                
            ];
        });
        // return Customers::all();
    }
    
    public function headings(): array
    {
        return [
            'id',
            'fname',
            'lname',
            'email',
            'phone',
            'address',
            'city',
            'state',
            'pcode',
            'ctype',
            'Created_at',
            'Updated_at',
            
        ];
    }
}