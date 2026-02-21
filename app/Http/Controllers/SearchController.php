<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packet;
use App\Models\Package;
use App\Models\Box;
use App\Models\Racks;
use App\Models\Location;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $rackId = $request->input('rackId');
        return view('search.index', compact('rackId'));
    }

    public function search(Request $request)
    {
        $jobNumber = $request->input('jobNumber');
        $rackId = $request->input('rackId');
        $results = collect();

        if ($jobNumber) {
            // Find all active packets matching the job number
            $packets = Packet::where('jobNumber', 'LIKE', "%{$jobNumber}%")
                ->whereNull('dateOut')
                ->where('numberOfBundles', '!=', 0)
                ->whereNull('deleted_at')
                ->get();

            foreach ($packets as $packet) {
                // Get package -> box -> rack -> location chain
                $package = Package::withTrashed()->where('pkgID', $packet->pkgID)->first();
                if (!$package) continue;

                $box = Box::find($package->boxId);
                if (!$box) continue;

                $rack = Racks::find($box->rack_id);
                if (!$rack) continue;

                $location = Location::where('locID', $rack->locID)->first();

                $results->push([
                    'packetID'            => $packet->packetID,
                    'jobNumber'           => $packet->jobNumber,
                    'materialType'        => $packet->materialType,
                    'materialDescription' => $packet->materialDescription,
                    'numberOfBundles'     => $packet->numberOfBundles,
                    'dateIn'              => $packet->dateIn,
                    'locationName'        => $location ? $location->name : '—',
                    'rackName'            => $rack->rackName,
                    'boxName'             => $box->boxName,
                    'rackId'              => $rack->rack_id,
                ]);
            }
        }

        return view('search.index', compact('results', 'jobNumber', 'rackId'));
    }
}
