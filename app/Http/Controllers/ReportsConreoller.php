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
        $dataAll = $request->session()->get('dataAll');

        $dataFromNotShipped = $request->session()->get('dataFromNotShipped');
        $dataFromShipped = $request->session()->get('dataFromShipped');

        return view('racks.reports', compact('dataFromSearch', 'dataFromNotShipped', 'dataFromShipped', 'dataAll'));
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


                $searchDataAll = $record
                ->leftjoin('packets', 'packages.pkgID', '=', 'packets.pkgID')
                ->select(
                    'packages.*',
                    'packets.*'
                )->get();


                $searchData = $record
                ->leftJoin('packets as p1', 'packages.pkgID', '=', 'p1.pkgID')
                ->select(
                    'packages.*',
                    'p1.*'
                )->paginate(10)->withQueryString();

                // return response()->json($searchData);

                return response()->json([
                    'paginated' => $searchData,
                    'all' => $searchDataAll
                ]);

        // return redirect()->route('reports')->with('dataFromSearch', $searchData)->with('dataAll', $searchDataAll);


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
                    'packets.*'
                )->get();

        $paginatedNotShippedData = $record
        ->leftJoin('packets as p1', 'packages.pkgID', '=', 'p1.pkgID')
        ->select(
            'packages.*',
            'p1.*'
            )->paginate(10)->withQueryString();


            // return response()->json($paginatedNotShippedData);

            return response()->json([
                'paginated' => $paginatedNotShippedData,
                'all' => $notShippedData
            ]);

        // return redirect()->route('reports')->with('dataFromNotShipped', $paginatedNotShippedData)->with('dataAll', $notShippedData);

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

        // Add this condition to filter records where "dateOut" is NOT null
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
                        'packets.*'
                    )->get();


            $paginatedShippedData = $record
            ->leftJoin('packets as p1', 'packages.pkgID', '=', 'p1.pkgID')
            ->select(
                'packages.*',
                'p1.*'
                )->paginate(10)->withQueryString();

            // return response()->json($paginatedShippedData);


            return response()->json([
                'paginated' => $paginatedShippedData,
                'all' => $shippedData
            ]);

        // return redirect()->route('reports')->with('dataFromShipped', $paginatedShippedData)->with('dataAll', $shippedData);

    }



    public function generateRecordForSearchDataTab(Request $request){

        // $dataAll = json_decode($request->dataAll);
        $dataAll = json_decode($request->input('dataAll'), true);


        return view('exportExcel', compact('dataAll'));
    }

    public function generateRecordForNotShippedTab(Request $request){

        $dataAll = json_decode($request->input('allData'), true);

        return view('exportExcel', compact('dataAll'));
    }

    public function generateRecordForShippedTab(Request $request){

        $dataAll = json_decode($request->input('allShippedData'), true);


        return view('exportExcel', compact('dataAll'));
    }


}
