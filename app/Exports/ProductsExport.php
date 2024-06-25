<?php

namespace App\Exports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Products::all()->map(function ($product) {

             $images = public_path('public/assets/image/'. $product->image);
             $imageUrl = asset('public/assets/image/' . $product->image);
            return [
                'ID'=> $product->id,
                'Product Name' => $product->pname,
                'Company Name' => $product->cname,
                'Product category' =>$product->pcate,  
                'Quentity' => $product->pquantity,
                'Images'=> '=HYPERLINK("' . $imageUrl . '","' . $images . '")',
                'Created_at'=> Carbon::parse($product->created_at)->format('d/m/Y'),
                'Updated_at'=> Carbon::parse($product->updated_at)->format('d/m/Y'),

                
            ];
        });
      
        
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product Name',
            'Company Name',
            'Product category',
            'Quntity',
            'Images',
            'Created_at',
            'Updated_at',
            
        ];
    }
}