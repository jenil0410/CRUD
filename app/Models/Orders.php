<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    use HasFactory;
    public $table = "orders";
    public $primarykey = "id";
    public $fillable = ['oname', 'ostatus', 'saddress', 'baddress', 'tamount', 'damount', 'productid' , 'customerid','discount'];

    public function product(): BelongsTo{
        return $this->belongsTo(Products::class,'productid', 'id');
    }
    
    public function customer(): BelongsTo{
        return $this->belongsTo(Customers::class,'customerid', 'id');
    }
}