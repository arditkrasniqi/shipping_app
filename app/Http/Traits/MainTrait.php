<?php

namespace App\Http\Traits;
use Auth;
use App\Role;

class MainTrait {
    public static function getDashboardView(){
        $roles = Role::all();
        if(self::isAdmin()){
            return view('dashboard.admin.newUser', [
                'roles'=>$roles
            ]);
        }else if(self::isPackager()){
            return view('dashboard.packager.new-package', [
                'roles'=>$roles
            ]);
        }else{
            return view('dashboard.user.track-package', [
                'roles'=>$roles
            ]);
        }

    }

    public static function generateString($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private static function isAdmin(){
        return Auth::user()->role->role === 'admin';
    }
    
    private static function isPackager(){
        return Auth::user()->role->role === 'packager';
    }
}