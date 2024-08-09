<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\Package;
use App\Models\Packet;

class RelocateToWMSController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'boxName' => 'required',

        ]);

        $pkgID = $request->input('pkgID');
        $rackID = $request->input('rackId');

        $boxName = $request->input('boxName');
        $boxRecord = Box::where('boxName', $boxName)->first();
        $boxId = $boxRecord->boxId;
        $pkgRecord = Package::where('boxID', $boxId)->where('dateOut', null)->first();
        // dd($pkgRecord);

        if (empty($pkgRecord)) {
            // If $pkgRecord is empty or not found, update the package's boxName and boxId
            $package = Package::where('pkgID', $pkgID)->first();
            $package->boxName = $boxName;
            $package->boxId = $boxId;

            $package->save();

            $packets = Packet::where('pkgID', $pkgID)->first();
            if(!empty($packets)){
                $packets->boxName = $boxName;
                $packets->save();
            }



            return redirect()->route('viewRacks', ['id' => $rackID])->with('success', 'Package Relocated Successfully');

        } else {
            return redirect()->route('viewRacks', ['id' => $rackID])->with('error', 'The Box is Not Empty');
        }

    }
}
