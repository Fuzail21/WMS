<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchLocation;

class BranchController extends Controller
{
    public function index(){
        return view('Location.addBranchLocation');
    }

    public function store(Request $request){
        $branchName = [
            'branchLocation' => $request['branchLocation'],
        ];

            $table = BranchLocation::create($branchName);

            $branchName = $table->name;
            // dd($phLocName);

            return redirect()->route('viewAllBranch');
    }

    public function view(){
        $branchLocation = BranchLocation::all();
        $data = compact('branchLocation');
        return view('Location.allBranch_Location')->with($data);
    }
}
