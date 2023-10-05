<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Packet;
use App\Models\Box;
use App\Models\RacksStructure;
use App\Http\Controllers\PackageDetails;

class PackageController extends Controller
{
    public function index(){
        return view('racks.addPackage');
    }

    public function store(Request $request)
{
    $boxId = $request->input('boxId');

    $box = Box::where('boxId', $boxId)->get();

    $rackId = $box[0]->rack_id;
    $boxName = $box[0]->boxName;


    $package = [
        'pkgName' => $request->input('packageName'),
        'pm' => $request->input('pm'),
        'purchasingAgent' => $request->input('purchasingAgent'),
        'dateIn' => $request->input('dateIn'),
        'expectedDateOut' => $request->input('expectedDateOut'),
        'boxId' => $boxId ,
        'boxName' => $boxName,
    ];

    $table = Package::create($package);

    $packageData = Package::where('boxId' , $boxId)->get();

    $packageId = $table->boxId;

    return redirect()->route('viewRacks', ['id' => $rackId]);

}


public function deletePackage(Request $request, $pkgId)
{
    $boxid = $request->query('boxid');
    $box = Box::where('boxId', $boxid)->get();
    $rackId = $box[0]->rack_id;


    // Find the package by ID
    $package = Package::find($pkgId);

    if (!$package) {
        // Handle the case where the package doesn't exist
        return redirect()->back()->with('error', 'Package not found.');
    }

    // Delete all associated packets
    $packets = Packet::where('pkgId', $pkgId)->delete();


    // Delete the package
    $package->delete();

    // // Redirect to a success page or back to the previous page
    return redirect()->route('viewRacks', ['id' => $rackId, 'success' => 'Package deleted successfully']);
}

}
