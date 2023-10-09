<?php

namespace App\Http\Controllers\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\Racks;
use App\Models\BranchLocation;
use App\Models\Packet;



class PartialRemoveMenuController extends Controller
{
    public function index(Request $request){
        $jobNumber = $request->input('jobNumber');
        $materialType = $request->input('materialType');
        $materialDescription = $request->input('materialDescription');
        $numberOfBundles = $request->input('numberOfBundles');
        $removeBundles = $request->input('removeBundles');
        $modifiedDate = $request->input('modifiedDate');
        $packetID = $request->input('packetID');


        $branchLocation = BranchLocation::pluck('branchLocation')->toArray();



        $data = compact('jobNumber', 'materialType', 'materialDescription', 'numberOfBundles', 'removeBundles', 'modifiedDate', 'packetID', 'branchLocation');
        return view('racks.partialRemoveMenu')->with($data);
    }
}
