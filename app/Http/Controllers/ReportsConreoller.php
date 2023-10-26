<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsConreoller extends Controller
{
    public function index(){
        return view('racks.reports');
    }
}
