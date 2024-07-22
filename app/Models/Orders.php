<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Orders extends Model
{
    use HasFactory, LogsActivity;
    public $table = "orders";
    public $primarykey = "id";
    public $fillable = ['oname', 'ostatus', 'saddress', 'baddress', 'tamount', 'damount', 'productid' , 'customerid','discount'];

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
    protected static $logName = 'Orders';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user()->name;

        return LogOptions::defaults()
            ->logOnly(['*'])
            ->useLogName('Orders')
            ->setDescriptionForEvent(function (string $eventName) use ($userName) {
                return "{$userName} has {$eventName} Orders";
            });
    }
}