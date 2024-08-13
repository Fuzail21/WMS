<?php

namespace App\Http\Controllers\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RacksStructure;
use App\Models\Location;
use App\Models\Box;
use App\Models\Racks;
use App\Models\Package;
use App\Models\Packet;
use App\Models\BranchLocation;

class RelocateToWMS extends Controller
{

public function relocateToWMS(Request $request){
    $rackID = $request->input('rackID');


    $jobNumber = $request->input('jobNumber');
    $materialType = $request->input('materialType');
    $materialDescription = $request->input('materialDescription');
    $numberOfBundles = $request->input('numberOfBundles');
    $removeBundles = $request->input('removeBundles');
    $modifiedDate = $request->input('modifiedDate');
    $updateNumofBundles = $numberOfBundles - $removeBundles;


    $packetID = $request->input('packetID');


    $boxName = $request->input('boxName');
    $newJobNumber = $request->input('newJobNumber');

        // PACKAGE RECORD AND ID OF THOSE RECORD
        $packageRecord = Package::where('boxName', $boxName)->where('dateOut', '=', NULL)->get();

        if ($packageRecord->isNotEmpty()) {

            $pkgIDArray = Package::where('boxName', $boxName)->where('dateOut', '=', NULL)->pluck('pkgID');
                $pkgID = $pkgIDArray[0];


                // BOX RECORD
                $boxRecord = Box::where("boxName", $boxName)->get();

                // Update packet
                $packetRecord = Packet::where('packetID', $packetID)->first();


                    $packetRecord->numberOfBundles = $updateNumofBundles;
                    $packetRecord->modifiedNumOfBundles = $removeBundles;
                    $packetRecord->modifiedDate = $modifiedDate;
                    $packetRecord->save();

                // Create New Packet
                $newPacket = new Packet;
                $newPacket->jobNumber = $newJobNumber;
                $newPacket->boxName = $boxName;
                $newPacket->pkgID = $pkgID; // Setting the foreign key to link this packet to the package
                $newPacket->materialDescription = $materialDescription;
                $newPacket->materialType = $materialType;
                $newPacket->numberOfBundles = $removeBundles; // new change
                $newPacket->dateIn = $modifiedDate;
                $newPacket->save();
                // Create New Packet

                return redirect()->route('viewRacks', ['id' => $rackID])->with('success', 'Packet Relocated Successfully');

        } else {
            return redirect()->route('viewRacks', ['id' => $rackID])->with('error', 'The Box is Empty. No Package Available for Relocation.');
        }


}
}
