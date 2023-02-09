<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalUser extends Model
{
    use HasFactory;
    public static $user,$user2;

    public static function SaveUserResister($request)
    {
        self::$user = new NormalUser();
        self::$user->name            = $request->name;
        self::$user->email           = $request->email;
        self::$user->phone           = $request->phone;
        self::$user->password        = bcrypt($request->password);
        self::$user->save();
    }

    public static function AdminSaveUserResister($request)
    {
        self::$user2 = new AdminUser();
        self::$user2->name            = $request->name;
        self::$user2->email           = $request->email;
        self::$user2->phone           = $request->phone;
        self::$user2->password        = bcrypt($request->password);
        self::$user2->save();
    }

}
