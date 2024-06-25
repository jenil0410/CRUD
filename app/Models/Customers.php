<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    public $table = "customers";
    public $primarykey = "id";
    public $fillable = ['fname','lname','phone','email','pcode','address','city','state','ctype'];
}
