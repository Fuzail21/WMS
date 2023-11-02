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

    public function searchData(Request $request){
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

        // dd($boxName);
        $package = Package::query();
        $packet = Packet::query();


        if ($boxName) {
            $package->where('boxName', 'LIKE', "%{$boxName}%");
        }

        if ($pkgID) {
            $package->where('pkgID', 'LIKE', "%{$pkgID}%");
        }

        if ($pkgName) {
            $package->where('pkgName', 'LIKE', "%{$pkgName}%");
        }

        if ($pm) {
            $package->where('pm', 'LIKE', "%{$pm}%");
        }

        if ($purchasingAgent) {
            $package->where('purchasingAgent', 'LIKE', "%{$purchasingAgent}%");
        }

        if ($pkgDateIn) {
            $package->whereDate('dateIn', 'LIKE', "%{$pkgDateIn}%");
        }

        if ($pkgDateOut) {
            $package->whereDate('dateOut', 'LIKE', "%{$pkgDateOut}%");
        }

        if ($deliveryLocation) {
            $package->where('deliveryLocation', 'LIKE', "%{$deliveryLocation}%");
        }

        if ($removingDriver) {
            $package->where('removingDriver', 'LIKE', "%{$removingDriver}%");
        }

        if ($removingNote) {
            $package->where('removingNote', 'LIKE', "%{$removingNote}%");
        }

        if ($jobNumber) {
            $packet->where('jobNumber', 'LIKE', "%{$jobNumber}%");
        }

        if ($pktDateIn) {
            $packet->whereDate('dateIn', 'LIKE', "%{$pktDateIn}%");
        }

        if ($materialType) {
            $package->where('materialType', 'LIKE',  "%{$materialType}%");
        }


        $packages = $package->get();
        $packets = $packet->get();

        dd($packages);
    }
}
