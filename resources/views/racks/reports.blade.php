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
        <img class="" src="{{ asset('img/20-20-Logo-Color.png') }}" alt="20-20-Logo" width="200px">
    </div>
    <div class="flex-1">
        <h5 class="pt-4 text-black">Warehouse Management System</h5>
    </div>
</div>










<div class="mb-4 border-b border-gray-200 " style="margin-left: -10%;">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg"  id="Search-tab" data-tabs-target="#Search" type="button" role="tab" aria-controls="Search" aria-selected="false">Search Data</button>
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


        <div class="flex justify-center items-center h-screen  " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form action="{{ route('searchData') }}" method="GET" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
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

        <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]">
            <span class="material-symbols-outlined pb-0 text-lg">description</span>
            <span class="ml-2">EXPORT TO EXCEL</span>
        </button>

        <div class=" w-full " style="margin-left: -10%;">
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

                    @foreach ($packageData as $package)
                        @foreach ($packetData as $packet)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
          </div>


    </div>
    {{-- 1st tab End  --}}





    {{-- 2nd tab Start  --}}
    <div class="hidden p-4 rounded-lg dark:bg-gray-800 w-[167%]" id="notShipping" role="tabpanel" aria-labelledby="notShipping-tab">


        <div class="flex justify-center items-center h-screen  " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form action="searchData.php" method="get" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
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

        <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]">
            <span class="material-symbols-outlined pb-0 text-lg">description</span>
            <span class="ml-2">EXPORT TO EXCEL</span>
        </button>

        <div class=" w-full " style="margin-left: -10%;">
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

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
          </div>


    </div>
    {{-- 2nd tab End  --}}






    {{-- 3rd tab Start  --}}

    <div class="hidden p-4 rounded-lg dark:bg-gray-800 w-[167%]" id="Shipped" role="tabpanel" aria-labelledby="Shipped-tab">


        <div class="flex justify-center items-center h-screen  " style="margin-top: -15%; margin-bottom: -15%; margin-left: -10%;">
            <form action="searchData.php" method="get" class="border-t border-b border-l border-r border-gray-300 p-6 rounded-lg w-full max-w-5xl">
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


        <button class="bg-[#0A1E61] text-white p-2 flex items-center mb-2 ml-[-10%]">
            <span class="material-symbols-outlined pb-0 text-lg">description</span>
            <span class="ml-2">EXPORT TO EXCEL</span>
        </button>

        <div class=" w-full " style="margin-left: -10%;">
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
          </div>



    </div>
        {{-- 3rd tab End  --}}



</div>



</div>














</div> {{-- this is closing div of header <div class="main"> --}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

    </script>
