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
    $jobNumber = $request->input('jobNumber');
    $materialType = $request->input('materialType');
    $materialDescription = $request->input('materialDescription');
    $numberOfBundles = $request->input('numberOfBundles');
    $removeBundles = $request->input('removeBundles');
    $modifiedDate = $request->input('modifiedDate');



    $boxName = $request->input('boxName');
    $jobNumber = $request->input('jobNumber');
    $packetID = $request->input('packetID');

    $boxRecord = Box::where("boxName", $boxName)->first();
    $packetRecord = Packet::where('packetID', $packetID)->first();

    dd($boxRecord);



}
}
