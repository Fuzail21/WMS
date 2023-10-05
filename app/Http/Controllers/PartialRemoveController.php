<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Packet;

class PartialRemoveController extends Controller
{
    public function index(Request $request, $packetID){
        $pkgId = $request->input('pkgId');
        $packetDetails = Packet::find($packetID);
        // dd($packetDetails);
        $data = compact('packetDetails', 'pkgId');
        return view('racks.partialRemove')->with($data);
    }

    public function removeBundle(Request $request){
        $pkgId = $request->input('pkgID');
        $packetID = $request->input('packetID');

        $modifiedDate = $request->input('modifiedDate');

        $numberOfBundles = $request->input('numberOfBundles');

        $removeBundle = $request->input('removeBundles');

        $updatedBundles = $numberOfBundles - $removeBundle;
        // dd($updatedBundles);

        $packetRecord = Packet::where('packetID', $packetID)->first();
        $packetRecord->numberOfBundles = $updatedBundles;
        $packetRecord->save();

        return redirect()->route('packets-details', ['pkgId' => $pkgId]);
    }
}
