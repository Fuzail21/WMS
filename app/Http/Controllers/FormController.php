<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function view(){
        return view('employeeTerminationForm');
    }

    public function formsubmit(Request $request){
        $radiooption = $request->input('myRadioGroup');
        dd($radiooption);
    }
}
