<?php

namespace App\Imports;

use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Log;

class OrderImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $product = Products::where('pname', $row['pname'])->first();
        $customer = Customers::where('email',$row['email'])
                                ->where('fname', $row['fname'])
                                ->first();
                   
                                
                                // if (!$product) {
                                //     $errorMessage = "No product found for: {$row['pname']}";
                                //     Log::channel('warning')->error($errorMessage);         
                                //     return null;
                                // }
                                
                                // if (!$customer) {
                                //     $errorMessage = "No customer found for row: email={$row['email']}, fname={$row['fname']}";
                                //     Log::channel('warning')->error($errorMessage);
                                //     return null;
                                // }
       
      if ($product || $customer) {
    
          return new Orders([
              

                  'productid' => $product->id,
                  'customerid' => $customer->id,
                  'oname' => $row['oname'],
                  'ostatus' => $row['ostatus'],
                  'saddress' => $row['saddress'],
                  'baddress' => $row['baddress'],
                  'tamount' => $row['tamount'],
                  'damount' => $row['damount'],
                  'discount' => $row['discount'],
              ]);
      }
        
            

            
        }
        public function rules(): array{
            return[
                '*.oname' => ['required','string'],
                '*.pname' => ['required'],
                '*.fname' => ['required'],
                '*.email' => ['required'],
                '*.ostatus' => ['required'],
                '*.saddress' => ['required'],
                '*.baddress' => ['required'],
                '*.tamount' => ['required'],
                '*.damount' => ['required'],
                '*.discount' => ['required'],
            ];
        }
        
}
