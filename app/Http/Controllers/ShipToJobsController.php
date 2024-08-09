<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Packet;

class ShipToJobsController extends Controller
{
    public function store(Request $request){

        $request->validate([
        'removingDriver' => 'required',
        'deliveryLocation' => 'required',
        'removingNote' => 'required',
        'truckNumber' => 'required|string',
    ]);

        $rackID = $request->input('rackId');

        $dateOut = $request->input('dateOut');
        $driver = $request->input('removingDriver');
        $location = $request->input('deliveryLocation');
        $note = $request->input('removingNote');
        $truck = $request->input('truckNumber');
        $pkgID = $request->input('pkgID');


        $Package = Package::where('pkgID' , $pkgID)->first();
        $Package->removingDriver = $driver;
        $Package->deliveryLocation = $location;
        $Package->removingNote = $note;
        $Package->truckNumber = $truck;
        $Package->dateOut = $dateOut;

        $Package->save();


        // Handle the database error or log it
        return redirect()->route('viewRacks', ['id' => $rackID]);

}
}
