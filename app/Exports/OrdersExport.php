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
                'ID' => $order->id,
                'Order Name' => $order->oname,
                'Product Name' => $order->Product->pname,
                'Customer Name' => $order->customer->fname,
                'Customer Email'=> $order->customer->email,
                'Order Status' => $order->ostatus,
                'Shipping Address' => $order->saddress,
                'Billing Address' => $order->baddress,
                'Total Amount' => $order->tamount,
                'Discount Amount' => $order->damount,
                'Discount' => $order->discount,
                'Created_at' => Carbon::parse($order->created_at)->format('d/m/Y'),
                'Updated_at' => Carbon::parse($order->updated_at)->format('d/m/Y'),
                
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Order Name',
            'Product Name',
            'Customer Name',
            'Customer Email',
            'Order Status',
            'Shipping Address',
            'Billing Address',
            'Total Amounnt',
            'Discount Amount',
            'Discount',
            'Created_at',
            'Updated_at',
            
            
        ];
    }
}