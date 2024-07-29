<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Permission extends Model
{
    use HasFactory;
    public $table = "modules";
    public $primarykey = "id";
    public $fillable =['Role_id','module','create','read','update','delete'];

    public static function checkCRUDPermissionToUser($checkPR, $checkPermission)
    {
        $loggedInUser = Auth::user();
        $CRUDData = '';

        $isSuper = 0;
        if ($loggedInUser->Role_id == 1) {
            $isSuper = 1;
        } else {
            $CRUDData = Permission::where('Role_id', $loggedInUser->Role_id)->where('module', $checkPR)->value($checkPermission);
        }

        if ($CRUDData == 'on' || $isSuper == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function isSuperAdmin()
    {
        $loggedInUser = Auth::user();
        $isSuper = 0;
        if ($loggedInUser->Role_id == 1) {
            $isSuper = 1;
        }
        return $isSuper;
    }

}
