{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
<html lang="en">

@extends('layouts.app')

@section('title' , 'Reports')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}">
@endsection


@section('content')

@include('layouts.sidebar')


<style>
    .pagination-link {
        margin-right: 5px; /* Spacing between links */
        padding: 5px 10px; /* Padding inside the link */
        border: 1px solid #ccc; /* Border around each link */
        text-decoration: none; /* Remove underline */
        color: black; /* Text color */
    }

    .pagination-link:hover {
        background-color: #f0f0f0; /* Background color on hover */
    }

    .pagination-link.active {
        font-weight: bold; /* Highlight the active link */
        background-color: #e0e0e0; /* Background color for active link */
    }
</style>


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main container">{{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}

{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




<div class="main"> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




<div class="flex m-3 mb-2" >
    <div class="flex-1 ml-[10%]">
        <img class="" src="{{ asset('img/20-20-Logo-Color.png') }}" alt="20-20-Logo" width="150px">
    </div>
    <div class="flex-1">
        <h5 class="pt-4 text-black">Warehouse Management System</h5>
    </div>
    
</div>




<div id="default-tab-content ml-5">




        <div class=" w-full " style="margin-left: -10%;">
            <table class="table border-collapse border border-slate-500" id="searchData">
                <thead >
                    <tr class="text-[12px]" >
                        <th>Box Name</th>
                        <th>Package ID</th>
                        <th>Package Name</th>
                        <th>PM</th>
                        <th>Purchasing Agent</th>
                        <th>Pkg Ship In</th>
                        <th>Pkg Expected Ship Out</th>
                        <th>Pkg Ship Out</th>
                        <th>Delivery Location</th>
                        <th>Removing Driver</th>
                        <th>Removing Note</th>
                        <th>Packets Job Number</th>
                        <th>Packets Ship In</th>
                        <th>Packet Material Type</th>
                        <th>Packets Material Decs</th>
                        <th>Number Of Bundles</th>
                        <th>Modified Number Of Bundles</th>
                        <th>Modified Date</th>
                        <th>Modified By</th>
                        <th>Truck Number</th>
                        <th>Packet Driver</th>
                        <th>Packet Truck Number</th>
                        <th>Packet Location</th>

                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($lessThan5DaysRecords))

                        @foreach ($lessThan5DaysRecords as $record)
                                <tr class="text-xs">
                                    <td>{{ $record->boxName }}</td>
                                    <td>{{ $record->pkgID }}</td>
                                    <td>{{ $record->pkgName }}</td>
                                    <td>{{ $record->pm }}</td>
                                    <td>{{ $record->purchasingAgent }}</td>
                                    <td>{{ $record->dateIn }}</td>
                                    <td>{{ $record->expectedDateOut }}</td>
                                    <td>{{ $record->dateOut }}</td>
                                    <td>{{ $record->deliveryLocation }}</td>
                                    <td>{{ $record->removingDriver }}</td>
                                    <td>{{ $record->removingNote }}</td>

                                    <td>{{ $record->jobNumber }}</td>
                                    <td>{{ $record->dateIn }}</td>
                                    <td>{{ $record->materialType }}</td>
                                    <td>{{ $record->materialDescription }}</td>
                                    <td>{{ $record->numberOfBundles }}</td>
                                    <td>{{ $record->modifiedNumOfBundles }}</td>
                                    <td>{{ $record->modifiedDate }}</td>
                                    <td>{{ $record->modifiedBy }}</td>
                                    <td>{{ $record->truckNumber }}</td>
                                    <td>{{ $record->packetDriver }}</td>
                                    <td>{{ $record->packetTruckNumber }}</td>
                                    <td>{{ $record->packetLocation }}</td>
                                </tr>

                        @endforeach
                    @endif

                </tbody>
            </table>
          </div>


            @if (!is_null($lessThan5DaysRecords))
                <!-- Display pagination links -->
                  {{ $lessThan5DaysRecords->links() }}
            @endif


        </div>

</div>

</div> {{-- this is closing div of header <div class="main"> --}}


