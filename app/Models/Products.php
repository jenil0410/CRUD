<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $table = "products";
    public $primarykey = "id";
    public $fillable = ['pname','cname','pcate','pquantity','image'];
}