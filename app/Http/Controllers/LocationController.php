<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Controllers\RackController;
use App\Models\BranchLocation;
use App\Http\Controllers\BranchController;

class LocationController extends Controller
{

    // This function returns a view for displaying a location form.
    public function index(){
        return view('Location.addlocation');
    }


    // The "addLocation" function creates a location record and redirects to the "addracks" route.
    public function addLocation(Request $request)
    {

        $branchID = request()->input('branchID');

        if ($branchID !== null) {
            $locationName = [
                'name' => $request['locationName'],
                'branchID'=> $branchID
            ];

                $table = Location::create($locationName);
                $branchLocations = Location::where('branchID', $branchID)->get();

                return redirect()->route('viewLocation', ['branchID' => $branchID]);
        } else {
            dd('id not found');
        }
    }


    // This function retrieves all location records, passes them to a view, and displays them on the "AllLocations" view.
    public function view($branchID){


        // Added in 2/27/2024
        $warehouseIds = [15, 10004]; // IDs of the locations you want to exclude
        $excludeWarehouseLocations = Location::whereNotIn('locID', $warehouseIds)->get();
        $excludeFabyardLocations = Location::whereIn('locID', $warehouseIds)->get();
        // Added in 2/27/2024

        $location = Location::all();
        $branchLocations = Location::where('branchID', $branchID)->get();
        // dd($branchID);
        $data = compact('location', 'branchLocations', 'branchID', 'excludeWarehouseLocations', 'excludeFabyardLocations');
        return view('Location.AllLocations')->with($data);
    }
}
