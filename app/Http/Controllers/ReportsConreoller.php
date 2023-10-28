<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Packet;

class ReportsConreoller extends Controller
{
    public function index(){
        $packetData = Packet::all();
        $packageData = Package::all();
        $data = compact('packetData' , 'packageData');
        return view('racks.reports')->with($data);;
    }

    public function searchData(){
        $boxName = $request->input('boxName');
        $pkgID = $request->input('pkgID');
        $pkgName = $request->input('pkgName');
        $pm = $request->input('pm');
        $purchasingAgent = $request->input('purchasingAgent');
        $pkgDateIn = $request->input('pkgDateIn');
        $pkgDateOut = $request->input('pkgDateOut');
        $deliveryLocation = $request->input('deliveryLocation');
        $removingDriver = $request->input('removingDriver');
        $removingNote = $request->input('removingNote');
        $jobNumber = $request->input('jobNumber');
        $pktDateIn = $request->input('pktDateIn');
        $materialType = $request->input('materialType');


        $query1 = Package::query();
        $query2 = Packet::query();


        if ($boxName) {
            $query->where('boxName', 'LIKE', '%' . $boxName . '%');
        }

        if ($pkgID) {
            $query->where('pkgID', $pkgID);
        }

        if ($pkgName) {
            $query->whereDate('pkgName', $pkgName);
        }

    }
}
