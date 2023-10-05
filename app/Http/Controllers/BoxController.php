<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\Racks;

class BoxController extends Controller
{


    // This function validates input, creates and saves a new "Box" instance, and redirects with the rack ID or handles database errors.
    public function saveData(Request $request)
{
    $request->validate([
        'rowPosition' => 'required',
        'columnPosition' => 'required',
        'innerBoxPosition' => 'required',
        'name' => 'required|string',
    ]);

    try {
        $rackid = $request->input('rackId');
        $rowPosition = $request->input('rowPosition');
        $columnPosition = $request->input('columnPosition');
        $innerBoxPosition = $request->input('innerBoxPosition');
        $name = $request->input('name');

        // Create a new instance of the Box model
        $box = new Box();
        $box->boxName = $name;
        $box->row_position = $rowPosition;
        $box->column_position = $columnPosition;
        $box->innerBox_position = $innerBoxPosition;
        $box->rack_id = $rackid;

        $box->save();
        $boxID = $box->boxId;

        return response()->json(['redirect' => route('viewRacks', ['id' => $rackid, 'boxId' => $boxID])]);
        // return response()->json(['redirect' => route('viewRacks', ['id' => $rackid])]);

    } catch (QueryException $e) {
        // Handle the database error or log it
        return redirect()->back()->with('error', 'Data could not be saved');
    }
    }

}
