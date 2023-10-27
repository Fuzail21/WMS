<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Packet;

class ReportsConreoller extends Controller
{
    public function index(){
        $packetData = Packet::all();
        $packageData = Package::all();
        $data = compact('packetData' , 'packageData');
        return view('racks.reports')->with($data);;
    }

    public function searchData(){

    }
}
