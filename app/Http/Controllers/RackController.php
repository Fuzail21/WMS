<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Racks;
use App\Models\RacksStructure;
use App\Models\Box;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PacketsController;
use App\Models\Package;
use App\Models\Packet;


class RackController extends Controller
{


    // This function fetches all location records and their primary keys for the "addnewrack" view.
    public function index() {
        $locID = Location::select('primaryKey');
        $location = Location::all();
        $data = compact('location');
        return view('racks.addnewrack', ['locID' => $locID])->with($data);
    }


    // This function handles rack creation, checks for duplicates, and either creates a new rack with its structure or returns an error if it already exists.
     public function store(Request $request){
        // Fetch locID based on the selected location
        $selectedLocation = $request['location'];
        $location = Location::where('locID', $selectedLocation)->first();
        $locID = $location->locID; // Assuming 'primaryKey' is the actual column name


        $selectedOption = $request->input('option');
        // dd($option);

        $data = [
            'rackName' => $request['rackName'],
            'locID' => $locID,
            'isStaging' => $selectedOption

        ];

        $existingRack = $existingRack = Racks::where('rackName', $request['rackName'])
        ->where('locID', $locID)
        ->first();

      if (!$existingRack) {

        $insertedRow = Racks::create($data);
            $insertedId = $insertedRow->rack_id;

            $dataForTable2 = [
                'rack_id' => $insertedId,
                'rows' => $request['rows'],
                'columns' => $request['columns'],
                'innerBoxes' => $request['innerBoxes'],
            ];

                $table = RacksStructure::create($dataForTable2);
                $id = $table->rack_id;
                return redirect()->route('viewRacks', ['id' => $id]);
      } else {
            return redirect()->back()->withErrors(['rack_exists' => 'This Rackname already exists in this Location']);
      }
  }



    // This function retrieves rack structures, checks for existence, and fetches related data, then passes it to the "showRack" view for display.
    public function view(Request $request, $id ){
        $rackStructures = RacksStructure::where('rack_id', $id)->get();
        if ($rackStructures->isEmpty()) {
            echo "No Racks found for the Provided ID.";
            return; // Exit the function to prevent further execution
        }

        $rackStructure = RacksStructure::where('rack_id', $id)->get();
        $rackId = $rackStructures[0]->rack_id;

        $racks = Racks::where('rack_id', $id)->get();

        $boxData = Box::where('rack_id', $rackId)->get();
        $boxId = $request->input('boxId');


        $search = $request['boxName'] ?? "";
        if ($search != '') {
            $allBoxNames = Box::where('boxName' , 'LIKE' , "%$search%")->get();
        } else {
            $allBoxNames = Box::pluck('boxName');
        }


        $allBoxNames = Box::pluck('boxName');

        $packages = Package::whereNull('dateOut')->get();
        $packets = Packet::all();

        $data = compact('rackStructure', 'racks', 'rackId' , 'boxData', 'boxId' , 'packages', 'packets' , 'allBoxNames');
        return view('racks.showRack')->with($data);

    }



    // This function retrieves all racks for a specific location and passes this data along with location details to the "AllRacks" view for display.
    public function viewAll(Request $request, $locID){
        $racksAll = Racks::where('locID', $locID)->get();
        $stagingRacks = Racks::where('locID', $locID)->where('isStaging', '=', '1')->get();

        $warehouseRacks = Racks::where('locID', $locID)->where('isStaging', '=', '0')->get();

        // $locationID = $request->input('locID');
        // dd($locationID);



        $location = Location::where('locID', $locID)->get();
        $allLocation = Location::all();

        $data = compact('stagingRacks', 'location', 'allLocation', 'warehouseRacks');
        return view('racks.AllRacks')->with($data);
    }

}
