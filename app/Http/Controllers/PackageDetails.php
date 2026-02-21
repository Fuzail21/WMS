<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packet;
use App\Models\Package;
use App\Models\Box;
use Carbon\Carbon;

class PackageDetails extends Controller
{
    public function packetDetails(Request $request, $pkgId){
        $search = $request->input('search');

        $query = Packet::where('pkgId', $pkgId)
            ->where('dateOut', '=', NULL)
            ->where('numberOfBundles', '!=', 0);

        if ($search) {
            $query->where('jobNumber', 'LIKE', "%{$search}%");
        }

        $packetDetails = $query->orderByRaw('TRY_CAST(jobNumber AS INT) ASC, jobNumber ASC')->get();

        $data = compact('packetDetails', 'search');
        return view('racks.packetsDetails')->with($data);
    }


    // public function trashPacketDetails($pkgId){
    //     $trashPacketDetails = Packet::where('pkgId' , $pkgId)->onlyTrashed()->get();
    //     // dd($packetDetails);
    //     $data = compact('trashPacketDetails');
    //     return view('racks.trashPacketDetails')->with($data);
    // }

    public function packageDetails($boxID){
        $box = Box::find($boxID);
        $boxName = $box ? $box->boxName : '';
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        // Get all package IDs for this box (including soft-deleted)
        $packageIds = Package::withTrashed()
            ->where('boxId', $boxID)
            ->pluck('pkgID');

        // Query 1: Shipped/deleted packets — belong to packages of this box
        $shippedPackets = Packet::withTrashed()
            ->whereIn('pkgID', $packageIds)
            ->get()
            ->filter(function ($packet) use ($thirtyDaysAgo) {
                return Carbon::parse($packet->updated_at)->greaterThanOrEqualTo($thirtyDaysAgo)
                    && (
                        !is_null($packet->deleted_at)
                        || !is_null($packet->dateOut)
                        || $packet->numberOfBundles == 0
                        || !is_null($packet->packetDriver)
                    );
            })
            ->map(function ($packet) {
                $packet->historyType = 'Ship to Job';
                return $packet;
            });

        // Query 2a: Packets relocated TO this box (package now belongs here, has relocatedAt stamp)
        $relocatedToHere = Packet::withTrashed()
            ->whereIn('pkgID', $packageIds)
            ->whereNotNull('relocatedAt')
            ->whereNotNull('relocatedFromBox')
            ->get()
            ->filter(function ($packet) use ($thirtyDaysAgo) {
                return Carbon::parse($packet->relocatedAt)->greaterThanOrEqualTo($thirtyDaysAgo);
            })
            ->map(function ($packet) {
                $packet->historyType = 'Relocate to WMS';
                return $packet;
            });

        // Query 2b: Packets relocated FROM this box (their relocatedFromBox equals this box's name)
        $relocatedFromHere = Packet::withTrashed()
            ->where('relocatedFromBox', $boxName)
            ->whereNotNull('relocatedAt')
            ->get()
            ->filter(function ($packet) use ($thirtyDaysAgo) {
                return Carbon::parse($packet->relocatedAt)->greaterThanOrEqualTo($thirtyDaysAgo);
            })
            ->map(function ($packet) {
                $packet->historyType = 'Relocate to WMS';
                return $packet;
            });

        // Merge all three, deduplicate by packetID, sort most recent first
        $history = $shippedPackets->merge($relocatedToHere)->merge($relocatedFromHere)
            ->unique('packetID')
            ->sortByDesc('updated_at')
            ->values();

        $data = compact('history', 'boxName', 'boxID');
        return view('racks.packageDetails')->with($data);
    }

    // public function trashPackageDetails($boxID){
    //     $trashPackageDetails = Package::where('boxId' , $boxID)->onlyTrashed()->get();
    //     // dd($packetDetails);
    //     $data = compact('trashPackageDetails');
    //     return view('racks.trashPackageDetails')->with($data);
    // }

}
