<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class User extends Model
{
    protected $fillable = ['name','email','password'];


    //авторизация администратора
    public static function check(Request $request) {
        $password = self::hash($request->password);
        $result = self::where('email', $request->email)->where('password',  $password)->first();

        if (isset($result)) {
            return  $result;
        }
        return  FALSE;
    }
    public static function hash($pass) {
        $salt1 = '#3@as';
        $salt2 = 'fdy!@';
        $pass = hash('ripemd128', "$salt1$pass$salt2");
        return $pass;
    }
    public function answer()
    {
        return $this->hasOne('App\Models\Answer');
    }
}



