<?php

namespace App\Http\Controllers\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\Racks;
use App\Models\BranchLocation;
use App\Models\Packet;
use App\Models\Package;



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



        $branchLocation = BranchLocation::pluck('branchLocation')->toArray();
        $allRackIds = Racks::where('locID', $locID)->pluck('rack_id');

        $allBoxNamesFromBox = Box::whereIn('rack_id', $allRackIds)->pluck('boxName');
        // dd($allBoxNamesFromBox);
        $allBoxNames = Box::whereIn('rack_id', $allRackIds)->pluck('boxName');
        //  dd($allBoxNames);
        $boxNamesFromPackage = Package::where('dateOut', NULL)->pluck('boxName');
        // dd($boxNamesFromPackage);



        $boxNamesWithPackages = $allBoxNamesFromBox->filter(function ($boxName) use ($boxNamesFromPackage) {
            return $boxNamesFromPackage->contains($boxName);
        });

        // dd($boxNamesWithPackages);

        $data = compact('jobNumber', 'materialType', 'materialDescription', 'numberOfBundles', 'removeBundles', 'modifiedDate', 'packetID', 'branchLocation', 'allBoxNames', 'boxNamesWithPackages', 'rackID');
        return view('racks.partialRemoveMenu')->with($data);
    }
}

