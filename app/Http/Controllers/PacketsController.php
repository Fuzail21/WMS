<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\RacksStructure;
use App\Models\Package;
use App\Http\Controllers\PackageController;
use App\Models\Packet;

class PacketsController extends Controller
{
    public function index(Request $request){
        return view('racks.addPackets');
    }

    public function store(Request $request){
        $boxId = $request->input('boxId');

        $package = Package::where('boxId', $boxId)
                 ->whereNull('dateOut')
                 ->get();

        $pkgId = $package[0]->pkgID;

        $box = Box::where('boxId', $boxId)->get();
        $boxName = $box[0]->boxName;
        $rackId = $box[0]->rack_id;

        $packets = [
            'jobNumber' => $request->input('jobName'),
            'dateIn' => $request->input('dateIn'),
            'materialType' => $request->input('material-type'),
            'materialDescription' => $request->input('materialDescription'),
            'numberOfBundles' => $request->input('numberOfBundles'),
            'boxName' => $boxName,
            'pkgID' => $pkgId,
        ];

        $table = Packet::create($packets);
        $packet = $table->pkgID;


        return redirect()->route('viewRacks', ['id' => $rackId]);
    }

    public function edit($packetID){

        $packet = Packet::find($packetID);
        if (is_null($packet)) {
            return 'This Packet not found';
        } else {
            $url = ('details/update'). "/" . $packetID;
            $data = compact('packet' , 'url' );
            return view('racks.addPackets')->with($data);
        }
    }



    public function delete($packetID){
        $packet = Packet::find($packetID);
        if (!is_null($packet)) {
            $packet->delete();
            return redirect()->back();
        }

    }



    public function getPacketDetails($packetID)
    {
        // Fetch packet details based on $packetID
        $packetDetails = Packet::find($packetID);

        return response()->json($packetDetails);
    }


    public function updatePacket(Request $request) {
        try {
                // Retrieve and validate data from the request
                $packetID = $request->input('packetID');
                // Retrieve other form fields as needed

                $numberOfBundle = $request->input('numberOfBundles');
                $addBundles = $request->input('addBundles');

                $updatedBundles = $numberOfBundle + $addBundles;

                //  Update the specific fields in the database
                Packet::where('packetID', $packetID)->update([
                    'numberOfBundles' => $updatedBundles,
                ]);

                // Respond with a success message
                return response()->json(['success' => true, 'message' => 'Packet updated successfully' ]);
            }   catch (\Exception $e) {
                    // Log the error for server-side debugging
                    \Log::error('Error updating packet: ' . $e->getMessage());

                     // Respond with an error message
                    return response()->json(['success' => false, 'message' => 'An error occurred while updating packet']);
                }
    }



    public function fetchUpdatedPacket($packetID) {
        // Fetch the updated packet details
        $packet = Packet::find($packetID);

        return response()->json(['success' => true, 'packet' => $packet]);
    }


}
