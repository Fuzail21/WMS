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
    public function index(Request $request){

        $branchID = $request->query('branchID');
        $location = Location::where('relation', 'parent')->where('branchID', $branchID)->get();

        $data = compact('location');
        return view('Location.addlocation')->with($data);
    }


    // The "addLocation" function creates a location record and redirects to the "addracks" route.
    public function addLocation(Request $request){

        $branchID = request()->input('branchID');

        if ($branchID !== null) {

            $locationName = [
                'name' => $request['locationName'],
                'branchID'=> $branchID,
                'relation' => $request['parent_location'] === null ? 'parent' : 'child',
                'parentId' => $request['parent_location'] !== null ? $request['parent_location'] : null,
            ];

            $table = Location::create($locationName);

                 // Check if parent_location has data
                if ($request['parent_location'] !== null) {
                    // Update the parent location to indicate it has a child
                    Location::where('locID', $request['parent_location'])->update([
                        'haveChild' => '1',
                    ]);
                }


                $branchLocations = Location::where('branchID', $branchID)->get();
                return redirect()->route('viewLocation', ['branchID' => $branchID]);
        } else {
            dd('id not found');
        }
    }


    // This function retrieves all location records, passes them to a view, and displays them on the "AllLocations" view.
    public function view($branchID){



         // Get parent locations without children that match the branchID
        $parentLocationWithOutChild = Location::where('relation', 'parent')
            ->where('haveChild', '0')
            ->where('branchID', $branchID)
            ->get();

        // Get parent locations with children that match the branchID
        $parentLocationsWithChild = Location::where('relation', 'parent')
            ->where('haveChild', '1')
            ->where('branchID', $branchID)
            ->get();

        $parentLocationIds = $parentLocationsWithChild->pluck('locID');

        $childLocations = Location::whereIn('parentId', $parentLocationIds)
        ->where('relation', 'child')
        ->where('branchID', $branchID)
        ->get();

        $location = Location::all();
        $branchLocations = Location::where('branchID', $branchID)->get();

        $data = compact('location', 'branchLocations', 'branchID', 'parentLocationWithOutChild', 'parentLocationsWithChild', 'childLocations');
        return view('Location.AllLocations')->with($data);
    }




    // public function view($branchID){

    //     $warehouseIds = [15, 10004];
    //     $excludeWarehouseLocations = Location::whereNotIn('locID', $warehouseIds)->get();
    //     $excludeFabyardLocations = Location::whereIn('locID', $warehouseIds)->get();


    //     $location = Location::all();
    //     $branchLocations = Location::where('branchID', $branchID)->get();

    //     $data = compact('location', 'branchLocations', 'branchID', 'excludeWarehouseLocations', 'excludeFabyardLocations');
    //     return view('Location.AllLocations')->with($data);
    // }
}
