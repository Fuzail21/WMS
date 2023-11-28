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
        $dataFromNotShipped = $request->session()->get('dataFromNotShipped');
        $dataFromShipped = $request->session()->get('dataFromShipped');


// dd($dataFromNotShipped);
        return view('racks.reports', compact('dataFromSearch', 'dataFromNotShipped', 'dataFromShipped'));
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

        $searchData = $record
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
            )->get(); // Add pagination with 15 records per page

            // dd($searchData);

        // $dataFromSearch = compact('data');
        // dd($dataFromSearch);
        return redirect()->route('reports')->with('dataFromSearch', $searchData);

    }





    public function NotShipped(Request $request){

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

        // Add this condition to filter records where "dateOut" is null
        $record->whereNull('packages.dateOut');

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

        $notShippedData = $record
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
            )->get();

        return redirect()->route('reports')->with('dataFromNotShipped', $notShippedData);

    }



    public function Shipped(Request $request){

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

        // Add this condition to filter records where "dateOut" is null
        $record->whereNotNull('packages.dateOut');

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

        $shippedData = $record
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
            )->get();

        return redirect()->route('reports')->with('dataFromShipped', $shippedData);

    }


    public function exportExcel(Request $request){

        // $boxName = $request->query('boxName', []);
        // $pkgID = $request->query('pkgID', []);
        // $pkgName = $request->query('pkgName', []);
        // $pm = $request->query('pm', []);
        // $purchasingAgent = $request->query('purchasingAgent', []);

        // $pkgShipIn = $request->query('pkgShipIn', []);
        // $pkgExpShipOut = $request->query('pkgExpShipOut', []);
        // $pkgShipOut = $request->query('pkgShipOut', []);
        // $deliveryLocation = $request->query('deliveryLocation', []);
        // $removingDriver = $request->query('removingDriver', []);

        // $removingNote = $request->query('removingNote', []);
        // $packetsJobNumber = $request->query('packetsJobNumber', []);
        // $packetsShipIn = $request->query('packetsShipIn', []);
        // $packetsMaterialType = $request->query('packetsMaterialType', []);
        // $pktMaterialDesc = $request->query('pktMaterialDesc', []);

        // $numOfBundles = $request->query('numOfBundles', []);
        // $modifiedNumOfBundles = $request->query('modifiedNumOfBundles', []);
        // $modifiedDate = $request->query('modifiedDate', []);
        // $modifiedBy = $request->query('modifiedBy', []);
        // $truckNum = $request->query('truckNum', []);

        // $packetDriver = $request->query('packetDriver', []);
        // $packetTruckNum = $request->query('packetTruckNum', []);
        // $packetLocation = $request->query('packetLocation', []);

        // // dd($packetLocation);


        // return view('excelView');

        $dataForExcel = [
            'boxName' => $request->query('boxName', []),
            'pkgID' => $request->query('pkgID', []),
            'pkgName' => $request->query('pkgName', []),
            'pm' => $request->query('pm', []),
            'purchasingAgent' => $request->query('purchasingAgent', []),
            'pkgShipIn' => $request->query('pkgShipIn', []),
            'pkgExpShipOut' => $request->query('pkgExpShipOut', []),
            'pkgShipOut' => $request->query('pkgShipOut', []),
            'deliveryLocation' => $request->query('deliveryLocation', []),
            'removingDriver' => $request->query('removingDriver', []),
            'removingNote' => $request->query('removingNote', []),
            'packetsJobNumber' => $request->query('packetsJobNumber', []),
            'packetsShipIn' => $request->query('packetsShipIn', []),
            'packetsMaterialType' => $request->query('packetsMaterialType', []),
            'pktMaterialDesc' => $request->query('pktMaterialDesc', []),
            'numOfBundles' => $request->query('numOfBundles', []),
            'modifiedNumOfBundles' => $request->query('modifiedNumOfBundles', []),
            'modifiedDate' => $request->query('modifiedDate', []),
            'modifiedBy' => $request->query('modifiedBy', []),
            'truckNum' => $request->query('truckNum', []),
            'packetDriver' => $request->query('packetDriver', []),
            'packetTruckNum' => $request->query('packetTruckNum', []),
            'packetLocation' => $request->query('packetLocation', []),
        ];



        return view('excelView', compact('dataForExcel'));
    }



}
