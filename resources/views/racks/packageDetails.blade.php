<html lang="en">

@extends('layouts.app')

@section('title' , 'Box History')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/trashbutton.css') }}">
@endsection


@section('content')

@include('layouts.sidebar')


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main container">

    <div>
        <h1 class="text-center ml-[50%]" style="font-weight: 700; color: #0A1E61;">
            Box History — Last 30 Days
        </h1>
        <p class="text-center ml-[50%]" style="color: #555; font-size: 14px;">
            Box: <strong>{{ $boxName }}</strong>
        </p>
    </div>

    <div class="ml-[25%] w-full">

        @if($history->isEmpty())
            <div class="alert alert-info mt-3" style="max-width: 600px;">
                No removal history found for this box in the last 30 days.
            </div>
        @else
        <table class="table table-bordered mt-3">
            <thead style="background-color: #0A1E61; color: white;">
                <tr>
                    <th>Type</th>
                    <th>Job Number</th>
                    <th>Material Type</th>
                    <th>Material Description</th>
                    <th>Bundles Removed</th>
                    <th>Date In</th>
                    <th>Date Out / Modified Date</th>
                    <th>Driver</th>
                    <th>Location</th>
                    <th>Truck Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $packet)
                <tr>
                    <td>
                        @if($packet->historyType === 'Ship to Job')
                            <span style="background-color: #D42A46; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px; white-space: nowrap;">Ship to Job</span>
                        @else
                            <span style="background-color: #0A1E61; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px; white-space: nowrap;">Relocate to WMS</span>
                        @endif
                    </td>
                    <td>{{ $packet->jobNumber }}</td>
                    <td>{{ $packet->materialType }}</td>
                    <td>{{ $packet->materialDescription }}</td>
                    <td>{{ $packet->modifiedNumOfBundles ?? $packet->numberOfBundles }}</td>
                    <td>{{ $packet->dateIn }}</td>
                    <td>{{ $packet->dateOut ?? $packet->modifiedDate ?? '—' }}</td>
                    <td>{{ $packet->packetDriver ?? '—' }}</td>
                    <td>{{ $packet->historyType === 'Relocate to WMS' ? ('From: ' . ($packet->relocatedFromBox ?? '—')) : ($packet->packetLocation ?? '—') }}</td>
                    <td>{{ $packet->packetTruckNumber ?? '—' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </div>

</div>


</body>
</html>
