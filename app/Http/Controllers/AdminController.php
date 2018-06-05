<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Http\Traits\MainTrait;

class AdminController extends Controller
{
    public function newUser(Request $request){
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->roleId = $request->role;
        // $user->personalNumber = $request->personalNumber;
        // $user->save();
        $user = [
            'name'=>$request->name,
            'email'=>$request->email,
            'roleId'=>$request->role,
            'personalNumber'=>$request->personalNumber,
            'token'=>MainTrait::generateString(20)
        ];
        DB::table('tmp_registrations')->insert($user);

        $this->notifyUser($user);
        return redirect()->back();
    }

    private function notifyUser($data)
    {
        $user = [
            'reg_link' => 'http://'.$_SERVER['HTTP_HOST'].'/password-setup/'.$data['token'],
            'name' => $data['name'],
            'email'=>$data['email']
        ];
        \Mail::send('emails.passwordSetup', $user, function ($message) use ($user) {
            $message->to($user['email'], 'test')->subject('Setup password');
        });
        return response()->json(['statusCode' => 200]);
    }
}
