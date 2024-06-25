<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    public $table = "profile";
    public $primarykey = "id";
    public $fillable = ['firstname', 'lastname', 'email', 'organization', 'phone', 'address', 'state' , 'zipcode','country', 'language' ,'timezone','currency'];

    public function order(): BelongsTo{
        return $this->belongsTo(Orders::class,'orderid', 'id');
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Products::class,'productid', 'id');
    }
    
    public function customer(): BelongsTo{
        return $this->belongsTo(Customers::class,'customerid', 'id');
    }
}
