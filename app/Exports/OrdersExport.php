<?php

namespace App\Exports;

use App\Models\Orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Orders::with(['product', 'customer'])->get()->map(function ($order) {
            return [
                'id' => $order->id,
                'oname' => $order->oname,
                'pname' => $order->Product->pname,
                'fname' => $order->customer->fname,
                'email'=> $order->customer->email,
                'ostatus' => $order->ostatus,
                'saddress' => $order->saddress,
                'baddress' => $order->baddress,
                'tamount' => $order->tamount,
                'damount' => $order->damount,
                'discount' => $order->discount,
                'Created_at' => Carbon::parse($order->created_at)->format('d/m/Y'),
                'Updated_at' => Carbon::parse($order->updated_at)->format('d/m/Y'),
                
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'id',
            'oname',
            'pname',
            'fname',
            'email',
            'ostatus',
            'saddress',
            'baddress',
            'tamount',
            'damount',
            'discount',
            'Created_at',
            'Updated_at',
            
            
        ];
    }
}