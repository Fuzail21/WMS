<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packet;
use App\Models\Package;

class PackageDetails extends Controller
{
    public function packetDetails(Request $request, $pkgId){
        $search = $request->input('search');

        $query = Packet::where('pkgId', $pkgId)
            ->where('dateOut', '=', NULL)
            ->where('numberOfBundles', '!=', 0);

        if ($search) {
            $query->where('jobNumber', 'LIKE', "%{$search}%");
        }

        $packetDetails = $query->orderByRaw('TRY_CAST(jobNumber AS INT) ASC, jobNumber ASC')->get();

        $data = compact('packetDetails', 'search');
        return view('racks.packetsDetails')->with($data);
    }


    // public function trashPacketDetails($pkgId){
    //     $trashPacketDetails = Packet::where('pkgId' , $pkgId)->onlyTrashed()->get();
    //     // dd($packetDetails);
    //     $data = compact('trashPacketDetails');
    //     return view('racks.trashPacketDetails')->with($data);
    // }

    public function packageDetails($boxID){
        $packageDetails = Package::where('boxId' , $boxID)->get();
        // dd($packetDetails);
        $data = compact('packageDetails');
        return view('racks.packageDetails')->with($data);
    }

    // public function trashPackageDetails($boxID){
    //     $trashPackageDetails = Package::where('boxId' , $boxID)->onlyTrashed()->get();
    //     // dd($packetDetails);
    //     $data = compact('trashPackageDetails');
    //     return view('racks.trashPackageDetails')->with($data);
    // }

}
