<?php

namespace App\Http\Controllers\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\Racks;
use App\Models\BranchLocation;
use App\Models\Packet;
use App\Models\Package;
use App\Models\Location;




class PartialRemoveMenuController extends Controller
{
    public function index(Request $request){
        $rackID = $request->input('rackID');

        $jobNumber = $request->input('jobNumber');
        $materialType = $request->input('materialType');
        $materialDescription = $request->input('materialDescription');
        $numberOfBundles = $request->input('numberOfBundles');
        $removeBundles = $request->input('removeBundles');
        $modifiedDate = $request->input('modifiedDate');
        $packetID = $request->input('packetID');

        $locID = $request->input('locID');

        $pkgId = $request->input('pkgID');

        if ($removeBundles > $numberOfBundles) {
            return redirect()->back()->with('error', 'Removing number of bundles is greater than the existing bundles');
        }



        $branchLocation = BranchLocation::pluck('branchID')->toArray();
        // dd($branchLocation);

        $allLocationID = Location::whereIn('branchID', $branchLocation)->pluck('locID');
        // dd($allLocation);


        $allRackIds = Racks::whereIn('locID', $allLocationID)->pluck('rack_id');
        // dd($allRackIds);


        $allBoxNamesFromBox = Box::whereIn('rack_id', $allRackIds)->pluck('boxName');
        // dd($allBoxNamesFromBox);
        $boxNamesFromPackage = Package::where('dateOut', NULL)->pluck('boxName');
        // dd($boxNamesFromPackage);



        $boxNamesWithPackages = $allBoxNamesFromBox->filter(function ($boxName) use ($boxNamesFromPackage) {
            return $boxNamesFromPackage->contains($boxName);
        });
        // dd($boxNamesWithPackages);


        $data = compact('jobNumber', 'materialType', 'materialDescription', 'numberOfBundles', 'removeBundles', 'modifiedDate', 'packetID', 'branchLocation', 'boxNamesWithPackages', 'rackID', 'boxNamesFromPackage');
        return view('racks.partialRemoveMenu')->with($data);
    }
}

