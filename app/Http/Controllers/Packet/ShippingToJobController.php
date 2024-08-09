<?php

namespace App\Http\Controllers\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Packet;

class ShippingToJobController extends Controller
{

    public function shippingToJob(Request $request){
        $rackID = $request->input('rackID');



        $packetID = $request->input('packetID');
        $modifiedDate = $request->input('modifiedDate');
        $numberOfBundles = $request->input('numberOfBundles');
        $removeBundles = $request->input('removeBundles');

        $updateNumofBundles = $numberOfBundles - $removeBundles;
        // dd($updateNumofBundles);

        // dd($numberOfBundles);

        $driverName = $request->input('driverName');
        $truckNumber = $request->input('truckNumber');
        $location = $request->input('location');


        $packet = Packet::where('packetID', $packetID)->first();
        $packet->packetDriver = $driverName;
        $packet->packetTruckNumber = $truckNumber;
        $packet->packetLocation = $location;
        $packet->modifiedDate = $modifiedDate;
        $packet->modifiedNumOfBundles = $removeBundles;
        $packet->numberOfBundles = $updateNumofBundles;
        $packet->save();


    return redirect()->route('viewRacks', ['id' => $rackID]);

    }
}
