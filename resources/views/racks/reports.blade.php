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


        <div class="flex justify-center items-center h-screen " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form id="searchForm" method="GET" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
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


        {{-- <form method="post" action="{{ route('searchDataTab') }}">
            @csrf
            <input type="hidden" name="dataAll" value="{{ json_encode($dataAll) }}">
            <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]">
                <span class="material-symbols-outlined pb-0 text-lg">description</span>
                <span  class="ml-2 bg-[#0A1E61] hover:bg-[#0A1E61] text-white font-bold py-1 px-1 rounded">EXPORT TO EXCEL</span>
            </button>
        </form> --}}


        <form id="exportForm" method="post" action="{{ route('searchDataTab') }}">
            @csrf
            <input type="hidden" name="dataAll" id="dataAll" value="">
            <button id="exportButton" class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]">
                <span class="material-symbols-outlined pb-0 text-lg">description</span>
                <span class="ml-2 bg-[#0A1E61] hover:bg-[#0A1E61] text-white font-bold py-1 px-1 rounded">EXPORT TO EXCEL</span>
            </button>
        </form>





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

          <div id="paginationContainer">
          </div>

          @if (!is_null($dataFromSearch))
          <!-- Display pagination links -->
            {{ $dataFromSearch->links() }}
        @endif


    </div>
    {{-- 1st tab End  --}}





    {{-- 2nd tab Start  --}}
    <div class="hidden p-4 rounded-lg dark:bg-gray-800 w-[167%]" id="notShipping" role="tabpanel" aria-labelledby="notShipping-tab">


        <div class="flex justify-center items-center h-screen  " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form id="notShippingSearchData" method="get" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
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

        <form id="exportForm" method="post" action="{{ route('notShippedTabData') }}">
            @csrf
            {{-- <input type="hidden" name="dataAll" value="{{ json_encode($dataAll) }}"> --}}
            <input type="hidden" name="allData" id="allData" value="">
            <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]">
                <span class="material-symbols-outlined pb-0 text-lg">description</span>
                <span class="ml-2 bg-[#0A1E61] hover:bg-[#0A1E61] text-white font-bold py-1 px-1 rounded">EXPORT TO EXCEL</span>
            </button>
        </form>

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
                                    <td>{{ $record->jobNumber }}</td>
                                    <td>{{ $record->dateIn }}</td>
                                    <td>{{ $record->materialType }}</td>
                                    <td>{{ $record->materialDescription }}</td>
                                    <td>{{ $record->numberOfBundles }}</td>
                                    <td>{{ $record->modifiedNumOfBundles }}</td>
                                    <td>{{ $record->modifiedDate }}</td>
                                    <td>{{ $record->modifiedBy }}</td>
                                    <td>{{ $record->truckNumber }}</td>
                                </tr>
                        @endforeach
                    @endif

                </tbody>
                </tbody>
            </table>
          </div>

          <div id="notShippedDataPaginationContainer">
        </div>


          @if (!is_null($dataFromNotShipped))
          <!-- Display pagination links -->
            {{ $dataFromNotShipped->links() }}
        @endif


    </div>
    {{-- 2nd tab End  --}}






    {{-- 3rd tab Start  --}}

    <div class="hidden p-4 rounded-lg dark:bg-gray-800 w-[167%]" id="Shipped" role="tabpanel" aria-labelledby="Shipped-tab">


        <div class="flex justify-center items-center h-screen  " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form id="ShippedTabSearchData" method="get" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
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


        <form id="exportForm" method="post" action="{{ route('shippedTabData') }}">
            @csrf
            {{-- <input type="hidden" name="dataAll" value="{{ json_encode($dataAll) }}"> --}}

            <input type="hidden" name="allShippedData" id="allShippedData" value="">
            <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]">
                <span class="material-symbols-outlined pb-0 text-lg">description</span>
                <span class="ml-2 bg-[#0A1E61] hover:bg-[#0A1E61] text-white font-bold py-1 px-1 rounded">EXPORT TO EXCEL</span>
            </button>
        </form>

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

                                    <td>{{ $record->jobNumber }}</td>
                                    <td>{{ $record->dateIn }}</td>
                                    <td>{{ $record->materialType }}</td>
                                    <td>{{ $record->materialDescription }}</td>
                                    <td>{{ $record->numberOfBundles }}</td>
                                    <td>{{ $record->modifiedNumOfBundles }}</td>
                                    <td>{{ $record->modifiedDate }}</td>
                                    <td>{{ $record->modifiedBy }}</td>
                                    <td>{{ $record->truckNumber }}</td>
                                </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
          </div>

          <div id="shippedDataPaginationContainer">
        </div>

          @if (!is_null($dataFromShipped))
          <!-- Display pagination links -->
            {{ $dataFromShipped->links() }}
        @endif


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




        document.addEventListener("DOMContentLoaded", function() {
    // Get the last active tab from local storage
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        document.querySelector('[data-tabs-target="' + lastTab + '"]').click();
    }

    // Add event listeners to tab buttons
    document.querySelectorAll('[data-tabs-target]').forEach(button => {
        button.addEventListener('click', function() {
            var target = this.getAttribute('data-tabs-target');
            // Store the active tab in local storage
            localStorage.setItem('lastTab', target);
        });
    });
});








// For 1st tab with ajax search


        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('searchForm');
            const tableBody = document.querySelector('#searchData tbody');
            const paginationContainer = document.getElementById('paginationContainer');
            const exportForm = document.getElementById('exportForm');
            const dataAllInput = document.getElementById('dataAll');

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(searchForm);
                const searchParams = new URLSearchParams(formData).toString(); // Convert FormData to URLSearchParams
                fetchData(`/reports-data?${searchParams}`);
            });

            function fetchData(url) {
                fetch(url, {
                    method: 'GET', // Use GET method for AJAX request
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Response:', data); // Log the response for debugging


                      // Store the 'all' variable in the hidden input field
                        if (data.all) {
                            dataAllInput.value = JSON.stringify(data.all);
                        }


                    // Clear existing table rows
                    tableBody.innerHTML = '';

                    // Check if data is available
                    if (data && data.paginated && Array.isArray(data.paginated.data)) {
                        data.paginated.data.forEach(record => {
                            const row = document.createElement('tr');
                            row.classList.add('text-xs'); // Add the text-xs class to the row
                            row.innerHTML = `
                                <td>${record.boxName ?? ''}</td>
                                <td>${record.pkgID ?? ''}</td>
                                <td>${record.pkgName ?? ''}</td>
                                <td>${record.pm ?? ''}</td>
                                <td>${record.purchasingAgent ?? ''}</td>
                                <td>${record.dateIn ?? ''}</td>
                                <td>${record.expectedDateOut ?? ''}</td>
                                <td>${record.dateOut ?? ''}</td>
                                <td>${record.deliveryLocation ?? ''}</td>
                                <td>${record.removingDriver ?? ''}</td>
                                <td>${record.removingNote ?? ''}</td>
                                <td>${record.jobNumber ?? ''}</td>
                                <td>${record.dateIn ?? ''}</td>
                                <td>${record.materialType ?? ''}</td>
                                <td>${record.materialDescription ?? ''}</td>
                                <td>${record.numberOfBundles ?? ''}</td>
                                <td>${record.modifiedNumOfBundles ?? ''}</td>
                                <td>${record.modifiedDate ?? ''}</td>
                                <td>${record.modifiedBy ?? ''}</td>
                                <td>${record.truckNumber ?? ''}</td>
                                <td>${record.packetDriver ?? ''}</td>
                                <td>${record.packetTruckNumber ?? ''}</td>
                                <td>${record.packetLocation ?? ''}</td>
                            `;
                            tableBody.appendChild(row);
                        });

                        // Display pagination links
                        paginationContainer.innerHTML = ''; // Clear previous pagination links
                        data.paginated.links.forEach(link => {
                            if (link.label) {
                                const linkElement = document.createElement('a');
                                linkElement.href = link.url || '#';
                                linkElement.innerHTML = link.label.includes('&laquo;') || link.label.includes('&raquo;') ? link.label : link.label;
                                linkElement.classList.add('pagination-link');
                                if (link.active) {
                                    linkElement.classList.add('active'); // Highlight the active link
                                }
                                paginationContainer.appendChild(linkElement);
                            } else {
                                console.error('Label is undefined for one of the links:', link);
                            }
                        });

                        // Add event listeners to pagination links
                        const paginationLinks = document.querySelectorAll('.pagination-link');
                        paginationLinks.forEach(link => {
                            link.addEventListener('click', function(e) {
                                e.preventDefault();
                                const url = this.href;
                                fetchData(url);
                            });
                        });

                    } else {
                        console.error('Invalid data format:', data);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });



// For 1st tab with ajax search







// For 2nd tab with ajax search


        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('notShippingSearchData');
            const tableBody = document.querySelector('#notShippedData tbody');
            const paginationContainer = document.getElementById('notShippedDataPaginationContainer');
            const exportForm = document.getElementById('exportForm');
            const dataAllInput = document.getElementById('allData');


            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(searchForm);
                const searchParams = new URLSearchParams(formData).toString(); // Convert FormData to URLSearchParams
                fetchData(`/notShipped-data?${searchParams}`);
            });


            function fetchData(url) {
                fetch(url, {
                    method: 'GET', // Use GET method for AJAX request
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Response:', data); // Log the response for debugging


                     // Store the 'all' variable in the hidden input field
                     if (data.all) {
                            dataAllInput.value = JSON.stringify(data.all);
                        }


                    // Clear existing table rows
                    tableBody.innerHTML = '';

                    // Check if data is available
                    if (data && data.paginated && Array.isArray(data.paginated.data)) {
                        data.paginated.data.forEach(record => {
                            const row = document.createElement('tr');
                            row.classList.add('text-xs'); // Add the text-xs class to the row
                            row.innerHTML = `
                                <td>${record.boxName ?? ''}</td>
                                <td>${record.pkgID ?? ''}</td>
                                <td>${record.pkgName ?? ''}</td>
                                <td>${record.pm ?? ''}</td>
                                <td>${record.purchasingAgent ?? ''}</td>
                                <td>${record.dateIn ?? ''}</td>
                                <td>${record.expectedDateOut ?? ''}</td>
                                <td>${record.dateOut ?? ''}</td>
                                <td>${record.deliveryLocation ?? ''}</td>
                                <td>${record.removingDriver ?? ''}</td>
                                <td>${record.removingNote ?? ''}</td>
                                <td>${record.jobNumber ?? ''}</td>
                                <td>${record.dateIn ?? ''}</td>
                                <td>${record.materialType ?? ''}</td>
                                <td>${record.materialDescription ?? ''}</td>
                                <td>${record.numberOfBundles ?? ''}</td>
                                <td>${record.modifiedNumOfBundles ?? ''}</td>
                                <td>${record.modifiedDate ?? ''}</td>
                                <td>${record.modifiedBy ?? ''}</td>
                                <td>${record.truckNumber ?? ''}</td>
                                <td>${record.packetDriver ?? ''}</td>
                                <td>${record.packetTruckNumber ?? ''}</td>
                                <td>${record.packetLocation ?? ''}</td>

                            `;
                            tableBody.appendChild(row);
                        });

                        // Display pagination links
                        paginationContainer.innerHTML = ''; // Clear previous pagination links
                        data.paginated.links.forEach(link => {
                            if (link.label) {
                                const linkElement = document.createElement('a');
                                linkElement.href = link.url || '#';
                                linkElement.innerHTML = link.label.includes('&laquo;') || link.label.includes('&raquo;') ? link.label : link.label;
                                linkElement.classList.add('pagination-link');
                                linkElement.style.marginRight = '5px'; // Add spacing between links
                                if (link.active) {
                                    linkElement.style.fontWeight = 'bold'; // Highlight the active link
                                }
                                paginationContainer.appendChild(linkElement);
                            } else {
                                console.error('Label is undefined for one of the links:', link);
                            }
                        });

                        // Add event listeners to pagination links
                        const paginationLinks = document.querySelectorAll('.pagination-link');
                        paginationLinks.forEach(link => {
                            link.addEventListener('click', function(e) {
                                e.preventDefault();
                                const url = this.href;
                                fetchData(url);
                            });
                        });

                    } else {
                        console.error('Invalid data format:', data);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });


// For 2nd tab with ajax search







// For 3rd tab with ajax search


        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('ShippedTabSearchData');
            const tableBody = document.querySelector('#shippedData tbody');
            const paginationContainer = document.getElementById('shippedDataPaginationContainer');
            const exportForm = document.getElementById('exportForm');
            const dataAllInput = document.getElementById('allShippedData');


            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(searchForm);
                const searchParams = new URLSearchParams(formData).toString(); // Convert FormData to URLSearchParams
                fetchData(`/shipped-data?${searchParams}`);
            });


            function fetchData(url) {
                fetch(url, {
                    method: 'GET', // Use GET method for AJAX request
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Response:', data); // Log the response for debugging


                     // Store the 'all' variable in the hidden input field
                     if (data.all) {
                            dataAllInput.value = JSON.stringify(data.all);
                        }

                    // Clear existing table rows
                    tableBody.innerHTML = '';

                    // Check if data is available
                    if (data && data.paginated && Array.isArray(data.paginated.data)) {
                        data.paginated.data.forEach(record => {
                            const row = document.createElement('tr');
                            row.classList.add('text-xs'); // Add the text-xs class to the row
                            row.innerHTML = `
                                <td>${record.boxName ?? ''}</td>
                                <td>${record.pkgID ?? ''}</td>
                                <td>${record.pkgName ?? ''}</td>
                                <td>${record.pm ?? ''}</td>
                                <td>${record.purchasingAgent ?? ''}</td>
                                <td>${record.dateIn ?? ''}</td>
                                <td>${record.expectedDateOut ?? ''}</td>
                                <td>${record.dateOut ?? ''}</td>
                                <td>${record.deliveryLocation ?? ''}</td>
                                <td>${record.removingDriver ?? ''}</td>
                                <td>${record.removingNote ?? ''}</td>
                                <td>${record.jobNumber ?? ''}</td>
                                <td>${record.dateIn ?? ''}</td>
                                <td>${record.materialType ?? ''}</td>
                                <td>${record.materialDescription ?? ''}</td>
                                <td>${record.numberOfBundles ?? ''}</td>
                                <td>${record.modifiedNumOfBundles ?? ''}</td>
                                <td>${record.modifiedDate ?? ''}</td>
                                <td>${record.modifiedBy ?? ''}</td>
                                <td>${record.truckNumber ?? ''}</td>
                                <td>${record.packetDriver ?? ''}</td>
                                <td>${record.packetTruckNumber ?? ''}</td>
                                <td>${record.packetLocation ?? ''}</td>
                            `;
                            tableBody.appendChild(row);
                        });

                        // Display pagination links
                        paginationContainer.innerHTML = ''; // Clear previous pagination links
                        data.paginated.links.forEach(link => {
                            if (link.label) {
                                const linkElement = document.createElement('a');
                                linkElement.href = link.url || '#';
                                linkElement.innerHTML = link.label.includes('&laquo;') || link.label.includes('&raquo;') ? link.label : link.label;
                                linkElement.classList.add('pagination-link');
                                linkElement.style.marginRight = '5px'; // Add spacing between links
                                if (link.active) {
                                    linkElement.style.fontWeight = 'bold'; // Highlight the active link
                                }
                                paginationContainer.appendChild(linkElement);
                            } else {
                                console.error('Label is undefined for one of the links:', link);
                            }
                        });

                        // Add event listeners to pagination links
                        const paginationLinks = document.querySelectorAll('.pagination-link');
                        paginationLinks.forEach(link => {
                            link.addEventListener('click', function(e) {
                                e.preventDefault();
                                const url = this.href;
                                fetchData(url);
                            });
                        });

                    } else {
                        console.error('Invalid data format:', data);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });


// For 3rd tab with ajax search








</script>

