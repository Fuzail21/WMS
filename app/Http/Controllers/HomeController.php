<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\RacksStructure;
use App\Models\Package;
use App\Models\Packet;
use App\Models\Location;
use App\Models\Racks;
use App\Models\BranchLocation;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $totalPackages = Package::whereNotNull('dateOut')->count();
        $totalPackets = Packet::whereNotNull('dateOut')->count();

        $totalBoxes = Box::all()->count();
        $totalRacks = Racks::all()->count();
        $allLocation = Location::all()->count();
        $allBranchLocation = BranchLocation::all()->count();



        // Get the current date
        $currentDate = Carbon::now();

        $dateLimit = $currentDate->copy()->addDays(5);

        // For Display in dashboard
        $lessThan5Days = Package::where('expectedDateOut', '>=', $currentDate)
            ->where('expectedDateOut', '<=', $dateLimit)
            ->count();

        $expiredPackages = Package::where('expectedDateOut', '<=', $currentDate)->count();



        $data = compact('totalPackages', 'totalPackets', 'totalBoxes', 'totalRacks', 'allLocation', 'allBranchLocation', 'lessThan5Days', 'expiredPackages');
        return view('dashboard')->with($data);
    }
}
