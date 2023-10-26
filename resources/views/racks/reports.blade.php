{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
<html lang="en">

@extends('layouts.app')

@section('title' , 'Partial Remove')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}">
@endsection


@section('content')

@include('layouts.sidebar')


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main container">{{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}

{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




<div class="main"> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}






<div class="border-gray-200 dark:border-gray-700 ">
    <ul class="flex -mb-px text-md font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="flex-grow" role="presentation">
            <button class="w-[99%] p-4 border-b-1 rounded-t-sm " id="searchData-tab" data-tabs-target="#searchData" type="button" role="tab" aria-controls="searchData" aria-selected="false">Search Data</button>
        </li>
        <li class="flex-grow" role="presentation">
            <button class="w-[99%] p-4 rounded-t-lg hover:text-gray-600  dark:hover:text-gray-300" id="notShipped-tab" data-tabs-target="#notShipped" type="button" role="tab" aria-controls="notShipped" aria-selected="false">Not Shipped</button>
        </li>
        <li><button class="w-[400%] p-4 rounded-t-lg hover:text-gray-600  dark:hover:text-gray-300 " id="Shipped-tab" data-tabs-target="#Shipped" type="button" role="tab" aria-controls="Shipped" aria-selected="false">Shipped</button></li>
    </ul>
</div>





        <div class="flex justify-center items-center h-screen w-[150%] " style="margin-top: -20%; margin-bottom: -15%;">
            <form action="searchData.php" method="get" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-1/4 px-4 mb-4">
                        <input id="boxName" placeholder="Box Name" name="boxName" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgID" placeholder="Package ID" name="pkgID" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgName" placeholder="Package Name" name="pkgName" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pm" placeholder="Project Manager" name="pm" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="purchasingAgent" placeholder="Purchasing Agent" name="purchasingAgent" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateIn" placeholder="Package Ship In" name="pkgDateIn" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateOut" placeholder="Package Ship Out" name="pkgDateOut" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="deliveryLocation" placeholder="Delivery Location" name="deliveryLocation" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingDriver" placeholder="Removing Driver" name="removingDriver" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingNote" placeholder="Removing Note" name="removingNote" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="jobNumber" placeholder="Job Number" name="jobNumber" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pktDateIn" placeholder="Packet Ship In" name="pktDateIn" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="materialType" placeholder="Material Type" name="materialType" type="text" class="border-b border-gray-300 p-2 w-full">
                    </div>



                </div>
                <div class="mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="search">Search</button>
                </div>
            </form>
        </div>


</div>




<div class=" w-full">
    <table class="table ">
        <thead>
            <tr>
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
                <th>Job Packet Driver</th>
                <th>Packet Truck Number</th>
                <th>Packet Location</th>

            </tr>
        </thead>
        <tbody>
            {{-- @foreach( as ) --}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
  </div>









</div> {{-- this is closing div of header <div class="main"> --}}
