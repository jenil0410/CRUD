<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;

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

    protected static $logAttributes = ['*'];
    protected static $logFillable = true;
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;
    protected static $logUnguarded = true;
    protected static $logName = 'Customers';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user()->full_name;

        return LogOptions::defaults()
            ->logOnly(['*'])
            ->useLogName('Customers')
            ->setDescriptionForEvent(function (string $eventName) use ($userName) {
                return "{$userName} has {$eventName} Customers";
            });
    }
}
