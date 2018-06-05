<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Traits\MainTrait;
use App\Package;
use App\TrackingStation;
use App\User;

class UserController extends Controller
{
    public function dashboardView(){
        return MainTrait::getDashboardView();
    }

    public function passwordSetup($token){
        $user = DB::table('tmp_registrations')->where('token',$token)->get()[0];
        $usr = [
            'name'=>$user->name,
            'email'=>$user->email,
            'roleId'=>$user->roleId,
            'personalNumber'=>$user->personalNumber,
        ];
        return view('dashboard.user.setupPassword',['tmp_name'=>$user->name, 'tmp_email'=>$user->email, 'tmp_roleId'=>$user->roleId, 'tmp_personalNumber'=>$user->personalNumber]);
    }

    public function postPasswordSetup(Request $request){
        DB::table("tmp_registrations")->where('email',$request->email)->delete();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roleId = $request->roleId;
        $user->personalNumber = $request->personalNumber;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->route('login');
    }

    public function getPackageDetails(Request $request){
        $package = Package::where('trackingCode',$request->trackingCode)->first();
        $packages= TrackingStation::where('packageId', $package->id)
            ->join('packages','packages.id','=','tracking_stations.packageId')
            ->select('packages.*','tracking_stations.created_at as date', 'tracking_stations.status', 'tracking_stations.id as trackingStationId')
            ->get();
        return view('dashboard.user.track-package',['packages'=>$packages]);
    }
}
