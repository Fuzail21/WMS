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
    public function fetchLocation(Request $request){
        $userLocation = $request->input('branchLocation');

    // Find the branch location record
    $branchlocRecord = BranchLocation::where('branchLocation', $userLocation)->first();

    if (!$branchlocRecord) {
        // Handle the case where the branch location is not found
        return response()->json(['error' => 'Branch location not found'], 404);
    }

    $branchID = $branchlocRecord->branchID;

    // Find the location record based on branchID
    $locationRecord = Location::where('branchID', $branchID)->first();

    if (!$locationRecord) {
        // Handle the case where the location is not found
        return response()->json(['error' => 'Location not found'], 404);
    }

    $locationName = $locationRecord->name;

    // Return the locationName in a JSON response
    return response()->json(['locationName' => $locationName]);
}
}
