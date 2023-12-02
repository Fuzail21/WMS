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


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main container">{{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}

{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




<div class="main"> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




<div class="flex m-3 mb-2" >
    <div class="flex-1 ml-[20%]">
        <img class="" src="{{ asset('img/20-20-Logo-Color.png') }}" alt="20-20-Logo" width="230px">
    </div>
    <div class="flex-1">
        <h5 class="pt-4 text-black">Warehouse Management System</h5>
    </div>
</div>










<div class="mb-4 border-b border-gray-200 " style="margin-left: -10%;">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg"  id="Search-tab" data-tabs-target="#Search" type="button" role="tab" aria-controls="Search" aria-selected="true">Search Data</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="notShipping-tab" data-tabs-target="#notShipping" type="button" role="tab" aria-controls="notShipping" aria-selected="false">Not Shipped</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Shipped-tab" data-tabs-target="#Shipped" type="button" role="tab" aria-controls="Shipped" aria-selected="false">Shipped</button>
        </li>
    </ul>
</div>




<div id="default-tab-content ml-5">



    {{-- 1st tab start  --}}
    <div class="hidden p-4 rounded-lg dark:bg-gray-800 w-[167%]" id="Search" role="tabpanel" aria-labelledby="Search-tab">


        <div class="flex justify-center items-center h-screen " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;" style="">
            <form id="searchForm" action="{{ route('searchData') }}" method="GET" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-1/4 px-4 mb-4">
                        <input id="boxName" placeholder="Box Name" name="boxName" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgID" placeholder="Package ID" name="pkgID" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgName" placeholder="Package Name" name="pkgName" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pm" placeholder="Project Manager" name="pm" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="purchasingAgent" placeholder="Purchasing Agent" name="purchasingAgent" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateIn" placeholder="Package Ship In" name="pkgDateIn" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateOut" placeholder="Package Ship Out" name="pkgDateOut" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="deliveryLocation" placeholder="Delivery Location" name="deliveryLocation" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingDriver" placeholder="Removing Driver" name="removingDriver" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingNote" placeholder="Removing Note" name="removingNote" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="jobNumber" placeholder="Job Number" name="jobNumber" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pktDateIn" placeholder="Packet Ship In" name="pktDateIn" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="materialType" placeholder="Material Type" name="materialType" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>



                </div>
                <div class="mt-4">
                    <button class="bg-[#0A1E61] hover:bg-[#0A1E61] text-white font-bold py-2 px-4 rounded" type="submit" name="search">Search</button>
                </div>
            </form>
        </div>



        {{-- <a href="{{ route('generateRecord') }}?{{ http_build_query([
            'boxName' => collect($dataFromSearch)->pluck('boxName')->toArray(),
            'pkgID' => collect($dataFromSearch)->pluck('pkgID')->toArray(),
            'pkgName' => collect($dataFromSearch)->pluck('pkgName')->toArray(),
            'pm' => collect($dataFromSearch)->pluck('pm')->toArray(),
            'purchasingAgent' => collect($dataFromSearch)->pluck('purchasingAgent')->toArray(),
            'pkgShipIn' => collect($dataFromSearch)->pluck('dateIn')->toArray(),
            'pkgExpShipOut' => collect($dataFromSearch)->pluck('expectedDateOut')->toArray(),
            'pkgShipOut' => collect($dataFromSearch)->pluck('dateOut')->toArray(),
            'deliveryLocation' => collect($dataFromSearch)->pluck('deliveryLocation')->toArray(),
            'removingDriver' => collect($dataFromSearch)->pluck('removingDriver')->toArray(),
            'removingNote' => collect($dataFromSearch)->pluck('removingNote')->toArray(),
            'packetsJobNumber' => collect($dataFromSearch)->pluck('pktJobNumber')->toArray(),
            'packetsShipIn' => collect($dataFromSearch)->pluck('pktShipIn')->toArray(),
            'packetsMaterialType' => collect($dataFromSearch)->pluck('pktMaterialType')->toArray(),
            'pktMaterialDesc' => collect($dataFromSearch)->pluck('pktMaterialDesc')->toArray(),
            'numOfBundles' => collect($dataFromSearch)->pluck('pktNumberOfBundles')->toArray(),
            'modifiedNumOfBundles' => collect($dataFromSearch)->pluck('pktModifiedNumOfBundles')->toArray(),
            'modifiedDate' => collect($dataFromSearch)->pluck('pktModifiedDate')->toArray(),
            'modifiedBy' => collect($dataFromSearch)->pluck('pktModifiedBy')->toArray(),
            'truckNum' => collect($dataFromSearch)->pluck('truckNumber')->toArray(),
            'packetDriver' => collect($dataFromSearch)->pluck('pktDriver')->toArray(),
            'packetTruckNum' => collect($dataFromSearch)->pluck('pktTruckNumber')->toArray(),
            'packetLocation' => collect($dataFromSearch)->pluck('pktLocation')->toArray(),

            ]) }}"> --}}
            <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]" onclick="downloadSearchDataCSV()">
                <span class="material-symbols-outlined pb-0 text-lg">description</span>
                <span class="ml-2">EXPORT TO EXCEL</span>
            </button>
        {{-- </a> --}}




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
                    @if (!is_null($dataFromSearch))

                        @foreach ($dataFromSearch as $record)
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
                                    <td>{{ $record->pktJobNumber }}</td>
                                    <td>{{ $record->pktShipIn }}</td>
                                    <td>{{ $record->pktMaterialType }}</td>
                                    <td>{{ $record->pktMaterialDesc }}</td>
                                    <td>{{ $record->pktNumberOfBundles }}</td>
                                    <td>{{ $record->pktModifiedNumOfBundles }}</td>
                                    <td>{{ $record->pktModifiedDate }}</td>
                                    <td>{{ $record->pktModifiedBy }}</td>
                                    <td>{{ $record->truckNumber }}</td>
                                    <td>{{ $record->pktDriver }}</td>
                                    <td>{{ $record->pktTruckNumber }}</td>
                                    <td>{{ $record->pktLocation }}</td>
                                </tr>

                        @endforeach
                    @endif

                </tbody>
            </table>
          </div>

          {{-- @if (!is_null($dataFromSearch))
          <!-- Display pagination links -->
            {{ $dataFromSearch->links() }}
        @endif --}}


    </div>
    {{-- 1st tab End  --}}





    {{-- 2nd tab Start  --}}
    <div class="hidden p-4 rounded-lg dark:bg-gray-800 w-[167%]" id="notShipping" role="tabpanel" aria-labelledby="notShipping-tab">


        <div class="flex justify-center items-center h-screen  " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form action="{{ route('notShippedData') }}" method="get" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-1/4 px-4 mb-4">
                        <input id="boxName" placeholder="Box Name" name="boxName" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgID" placeholder="Package ID" name="pkgID" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgName" placeholder="Package Name" name="pkgName" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pm" placeholder="Project Manager" name="pm" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="purchasingAgent" placeholder="Purchasing Agent" name="purchasingAgent" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateIn" placeholder="Package Ship In" name="pkgDateIn" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateOut" placeholder="Package Ship Out" name="pkgDateOut" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="deliveryLocation" placeholder="Delivery Location" name="deliveryLocation" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingDriver" placeholder="Removing Driver" name="removingDriver" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingNote" placeholder="Removing Note" name="removingNote" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="jobNumber" placeholder="Job Number" name="jobNumber" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pktDateIn" placeholder="Packet Ship In" name="pktDateIn" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="materialType" placeholder="Material Type" name="materialType" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>



                </div>
                <div class="mt-4">
                    <button class="bg-[#0A1E61] hover:bg-[#0A1E61] text-white font-bold py-2 px-4 rounded" type="submit" name="search">Search</button>
                </div>
            </form>
        </div>

        <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]" onclick="downloadnotShippedDataCSV()">
            <span class="material-symbols-outlined pb-0 text-lg">description</span>
            <span class="ml-2">EXPORT TO EXCEL</span>
        </button>

        <div class=" w-full " style="margin-left: -10%;">
            <table class="table" id="notShippedData" >
                <thead>
                    <tr class="text-[12px]">
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

                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($dataFromNotShipped))

                        @foreach ($dataFromNotShipped as $record)
                                <tr class="text-xs" >
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
                                    <td>{{ $record->pktJobNumber }}</td>
                                    <td>{{ $record->pktShipIn }}</td>
                                    <td>{{ $record->pktMaterialType }}</td>
                                    <td>{{ $record->pktMaterialDesc }}</td>
                                    <td>{{ $record->pktNumberOfBundles }}</td>
                                    <td>{{ $record->pktModifiedNumOfBundles }}</td>
                                    <td>{{ $record->pktModifiedDate }}</td>
                                    <td>{{ $record->pktModifiedBy }}</td>
                                    <td>{{ $record->truckNumber }}</td>
                                </tr>
                        @endforeach
                    @endif

                </tbody>
                </tbody>
            </table>
          </div>


    </div>
    {{-- 2nd tab End  --}}






    {{-- 3rd tab Start  --}}

    <div class="hidden p-4 rounded-lg dark:bg-gray-800 w-[167%]" id="Shipped" role="tabpanel" aria-labelledby="Shipped-tab">


        <div class="flex justify-center items-center h-screen  " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form action="{{ route('shippedData') }}" method="get" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-1/4 px-4 mb-4">
                        <input id="boxName" placeholder="Box Name" name="boxName" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgID" placeholder="Package ID" name="pkgID" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgName" placeholder="Package Name" name="pkgName" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pm" placeholder="Project Manager" name="pm" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="purchasingAgent" placeholder="Purchasing Agent" name="purchasingAgent" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateIn" placeholder="Package Ship In" name="pkgDateIn" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pkgDateOut" placeholder="Package Ship Out" name="pkgDateOut" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="deliveryLocation" placeholder="Delivery Location" name="deliveryLocation" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingDriver" placeholder="Removing Driver" name="removingDriver" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="removingNote" placeholder="Removing Note" name="removingNote" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="jobNumber" placeholder="Job Number" name="jobNumber" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>
                    <div class="w-1/4 px-4 mb-4">
                        <input id="pktDateIn" placeholder="Packet Ship In" name="pktDateIn" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>

                    <!-- Add more input fields as needed in a similar manner -->

                    <div class="w-1/4 px-4 mb-4">
                        <input id="materialType" placeholder="Material Type" name="materialType" type="search" class="border-b border-gray-300 p-2 w-full">
                    </div>



                </div>
                <div class="mt-4">
                    <button class="bg-[#0A1E61] hover:bg-[#0A1E61] text-white font-bold py-2 px-4 rounded" type="submit" name="search">Search</button>
                </div>
            </form>
        </div>


        <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]" onclick="downloadShippedDataCSV()">
            <span class="material-symbols-outlined pb-0 text-lg">description</span>
            <span class="ml-2">EXPORT TO EXCEL</span>
        </button>

        <div class=" w-full " style="margin-left: -10%;">
            <table class="table" id="shippedData">
                <thead>
                    <tr class="text-[12px]">
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
                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($dataFromShipped))

                        @foreach ($dataFromShipped as $record)
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
                                    <td>{{ $record->pktJobNumber }}</td>
                                    <td>{{ $record->pktShipIn }}</td>
                                    <td>{{ $record->pktMaterialType }}</td>
                                    <td>{{ $record->pktMaterialDesc }}</td>
                                    <td>{{ $record->pktNumberOfBundles }}</td>
                                    <td>{{ $record->pktModifiedNumOfBundles }}</td>
                                    <td>{{ $record->pktModifiedDate }}</td>
                                    <td>{{ $record->pktModifiedBy }}</td>
                                    <td>{{ $record->truckNumber }}</td>
                                </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
          </div>



    </div>
        {{-- 3rd tab End  --}}



</div>



</div>














</div> {{-- this is closing div of header <div class="main"> --}}

<!-- Include SheetJS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

<!-- Include FileSaver.js from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>



        $(document).ready(function () {
          // Add a click event handler for the tab buttons
          $("button[role='tab']").click(function () {
            // Get the target content ID from the data-tabs-target attribute
            var targetContentId = $(this).attr("data-tabs-target");

            // Hide all content divs
            $("div[role='tabpanel']").addClass("hidden");

            // Show the selected content
            $(targetContentId).removeClass("hidden");

            // Remove the "aria-selected" attribute from all buttons
            $("button[role='tab']").attr("aria-selected", "false");

            // Set the "aria-selected" attribute for the clicked button to "true"
            $(this).attr("aria-selected", "true");
          });
        });



        // Get all tab buttons and tab content
            const tabButtons = document.querySelectorAll('[data-tabs-target]');
            const tabContent = document.querySelectorAll('[role="tabpanel"]');

            // Add a click event listener to each tab button
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove the 'active' class from all tab buttons and tab content
                    tabButtons.forEach(btn => btn.classList.remove('bg-[#0A1E61]', 'text-white'));
                    tabContent.forEach(content => content.classList.add('hidden'));

                    // Add the 'active' class to the clicked tab button and its corresponding tab content
                    const targetId = button.getAttribute('data-tabs-target');
                    const targetContent = document.querySelector(targetId);

                    if (targetContent) {
                        button.classList.add('bg-[#0A1E61]', 'text-white');
                        targetContent.classList.remove('hidden');
                    }
                });
            });







         // JavaScript code to set the default active tab
         document.addEventListener("DOMContentLoaded", function () {
             // Get the button for the desired default active tab
             var defaultActiveTabButton = document.getElementById("Search-tab");

             // Simulate a click on the button to make it active
             defaultActiveTabButton.click();
         });





    //      function downloadExcel() {
    //     // Get the table HTML content
    //     var table = document.getElementById("myTable");
    //     var html = table.innerHTML;

    //     // Create a Blob with the HTML content
    //     var blob = new Blob([html], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });

    //     // Save the Blob as a file using FileSaver.js
    //     saveAs(blob, "table.xlsx");
    // }


    function downloadSearchDataCSV() {
        // Get the table element by ID
        var table = document.getElementById("searchData");

        // Initialize an empty CSV string
        var csv = [];

        // Iterate over the rows in the table
        var rows = table.querySelectorAll("tr");
        rows.forEach(function (row) {
            // Initialize an empty array for each row
            var rowData = [];

            // Iterate over the cells in the row
            var cells = row.querySelectorAll("td, th");
            cells.forEach(function (cell) {
                // Push the cell's text content into the row data array
                rowData.push(cell.textContent.trim());
            });

            // Push the row data as a comma-separated string into the CSV array
            csv.push(rowData.join(","));
        });

        // Join the CSV array into a single string with line breaks
        var csvContent = csv.join("\n");

        // Create a Blob with the CSV content and UTF-8 encoding
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });

        // Save the Blob as a file using FileSaver.js
        saveAs(blob, "UserPackageDetails.csv");
    }





    function downloadnotShippedDataCSV() {
        // Get the table element by ID
        var table = document.getElementById("notShippedData");

        // Initialize an empty CSV string
        var csv = [];

        // Iterate over the rows in the table
        var rows = table.querySelectorAll("tr");
        rows.forEach(function (row) {
            // Initialize an empty array for each row
            var rowData = [];

            // Iterate over the cells in the row
            var cells = row.querySelectorAll("td, th");
            cells.forEach(function (cell) {
                // Push the cell's text content into the row data array
                rowData.push(cell.textContent.trim());
            });

            // Push the row data as a comma-separated string into the CSV array
            csv.push(rowData.join(","));
        });

        // Join the CSV array into a single string with line breaks
        var csvContent = csv.join("\n");

        // Create a Blob with the CSV content and UTF-8 encoding
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });

        // Save the Blob as a file using FileSaver.js
        saveAs(blob, "UserPackageDetails.csv");
    }




    function downloadShippedDataCSV() {
        // Get the table element by ID
        var table = document.getElementById("shippedData");

        // Initialize an empty CSV string
        var csv = [];

        // Iterate over the rows in the table
        var rows = table.querySelectorAll("tr");
        rows.forEach(function (row) {
            // Initialize an empty array for each row
            var rowData = [];

            // Iterate over the cells in the row
            var cells = row.querySelectorAll("td, th");
            cells.forEach(function (cell) {
                // Push the cell's text content into the row data array
                rowData.push(cell.textContent.trim());
            });

            // Push the row data as a comma-separated string into the CSV array
            csv.push(rowData.join(","));
        });

        // Join the CSV array into a single string with line breaks
        var csvContent = csv.join("\n");

        // Create a Blob with the CSV content and UTF-8 encoding
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });

        // Save the Blob as a file using FileSaver.js
        saveAs(blob, "UserPackageDetails.csv");
    }





</script>

