<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Packet;
use Illuminate\Support\Facades\DB;

class ReportsConreoller extends Controller
{
    public function index(Request $request){

        $dataFromSearch = $request->session()->get('dataFromSearch');
// dd($dataFromSearch);
        return view('racks.reports', compact('dataFromSearch'));
    }

    public function searchData(Request $request){

        $record = DB::table('packages');


        $boxName = $request->input('boxName');
        $pkgID = $request->input('pkgID');
        $pkgName = $request->input('pkgName');
        $pm = $request->input('pm');
        $purchasingAgent = $request->input('purchasingAgent');
        $pkgDateIn = $request->input('pkgDateIn');
        $pkgDateOut = $request->input('pkgDateOut');
        $deliveryLocation = $request->input('deliveryLocation');
        $removingDriver = $request->input('removingDriver');
        $removingNote = $request->input('removingNote');
        $jobNumber = $request->input('jobNumber');
        $pktDateIn = $request->input('pktDateIn');
        $materialType = $request->input('materialType');


        if ($boxName) {
            $record->where('packages.boxName', 'LIKE', "%{$boxName}%");
        }

        if ($pkgID) {
            $record->where('packages.pkgID', 'LIKE', "%{$pkgID}%");
        }

        if ($pkgName) {
            $record->where('packages.pkgName', 'LIKE', "%{$pkgName}%");
        }

        if ($pm) {
            $record->where('packages.pm', 'LIKE', "%{$pm}%");
        }

        if ($purchasingAgent) {
            $record->where('packages.purchasingAgent', 'LIKE', "%{$purchasingAgent}%");
        }

        if ($pkgDateIn) {
            $record->where('packages.dateIn', 'LIKE', "%{$pkgDateIn}%");
        }

        if ($pkgDateOut) {
            $record->where('packages.dateOut', 'LIKE', "%{$pkgDateOut}%");
        }

        if ($deliveryLocation) {
            $record->where('packages.deliveryLocation', 'LIKE', "%{$deliveryLocation}%");
        }

        if ($removingDriver) {
            $record->where('packages.removingDriver', 'LIKE', "%{$removingDriver}%");
        }

        if ($removingNote) {
            $record->where('packages.removingNote', 'LIKE', "%{$removingNote}%");
        }

        if ($jobNumber) {
            $record->where('packets.jobNumber', 'LIKE', "%{$jobNumber}%");
        }

        if ($pktDateIn) {
            $record->where('packets.dateIn', 'LIKE', "%{$pktDateIn}%");
        }

        if ($materialType) {
            $record->where('packets.materialType', 'LIKE',  "%{$materialType}%");
        }

        // $data1 = DB::table('packets')->get();

        $data = $record
            ->leftjoin('packets', 'packages.pkgID', '=', 'packets.pkgID')
            ->select(
                'packages.*',
                'packets.jobNumber AS pktJobNumber',
                'packets.dateIn AS pktShipIn',
                'packets.materialType AS pktMaterialType',
                'packets.materialDescription AS pktMaterialDesc',
                'packets.numberOfBundles AS pktNumberOfBundles',
                'packets.modifiedNumOfBundles AS pktModifiedNumOfBundles',
                'packets.modifiedDate AS pktModifiedDate',
                'packets.modifiedBy AS pktModifiedBy',
                'packets.packetDriver AS pktDriver',
                'packets.packetTruckNumber AS pktTruckNumber',
                'packets.packetLocation AS pktLocation'
            )->get();


            // dd($data);

        // $dataFromSearch = compact('data');
        // dd($dataFromSearch);
        return redirect()->route('reports')->with('dataFromSearch', $data);

    }
}
