<?php

namespace App\Http\Controllers;

use App\Http\Traits\MainTrait;
use App\Package;
use Auth;
use App\TrackingStation;
use Illuminate\Http\Request;

class PackagerController extends Controller
{
    private $trackingCode = '';
    public function newPackage(Request $request){
        $this->trackingCode = MainTrait::generateString(10);
        $package = new Package();
        $package->name = $request->name;
        $package->description = $request->description;
        $package->source = $request->source;
        $package->destination = $request->destination;
        $package->trackingCode = $this->trackingCode;
        $package->createdBy = Auth::user()->id;
        $package->save();

        $trackingStation = new TrackingStation();
        $trackingStation->packageId = $package->id;
        $trackingStation->status = 'Package started';
        $trackingStation->save();

        $data = [
            'code'=>$this->trackingCode,
            'email'=>Auth::user()->email
        ];

        $this->sendTrackCode($data);

        return redirect()->route('packages');
    }

    public function getPackage($code){
        $package = Package::where('trackingCode',$code)->first();
        $packageStatus = TrackingStation::where('packageId', $package->id)
            ->join('packages','packages.id','=','tracking_stations.packageId')
            ->select('packages.*','tracking_stations.created_at as date', 'tracking_stations.status', 'tracking_stations.id as trackingStationId')
            ->get();
        return view('dashboard.packager.update-package-status',['packages'=>$packageStatus]);
    }

    public function updatePackage(Request $request){
        TrackingStation::insert([
            'packageId'=>$request->packageId,
            'status'=>$request->status,
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d')
        ]);
        return redirect()->back();
    }

    public function getPackages(){
        $packages = Package::where('createdBy', Auth::user()->id)
            ->join('tracking_stations','tracking_stations.packageId','=','packages.id')
            ->select('packages.*')
            ->distinct('packages.id')
            ->get();

        return view('dashboard.packager.packages',['packages'=>$packages]);
    }

    private function sendTrackCode($data)
    {
        \Mail::send('emails.packageCode', $data, function ($message) use ($data) {
            $message->to($data['email'], 'test')->subject('Package tracking code');
        });
    }
}
