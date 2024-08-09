{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
<html lang="en">
@extends('layouts.app')

@section('title' , 'All Racks')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
{{--
<link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}"> --}}
@endsection


@section('content')

@include('layouts.sidebar')


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold "> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main"> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}



    {{-- print a location name through controller  --}}
    @foreach ($location as $loc) {{-- $location saved in RackController FUNCTION VIEWALL --}}
    <h1 class="text-center uppercase ">{{ $loc->name }}</h1>
    <p class="text-center">All Racks</p>
    @endforeach


    <div class="d-flex align-items-center col-md-12 mb-4">
        <div class="col-md-4">
            <select id="location" class="form-control" name="location" required>
                <option value="" disabled selected>Select a location</option>
                @foreach($allLocation as $location)
                <option class="capitalize" value="{{ route('viewAllRacks', ['locID' => $location->locID]) }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('newRack') }}" class="ml-[60%]">
            <button class="text-white bg-[#0A1E61] py-2 px-2 ml-2">Add Racks</button>
        </a>
    </div>


    {{-- // new Change --}}
    @php
        $showStaging = false;
        $locID = $warehouseRacks->pluck('locID');
        foreach ($locID as $id) {
            if ($id !== '10003') {
                $showStaging = true;
                break;
            }
        }
    @endphp

    {{-- // new Change --}}



        <div class="border-gray-200 dark:border-gray-700">
            <ul class="flex -mb-px text-md font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="flex-grow" role="presentation">
                    <button class="w-[99%] p-4 border-b-1 rounded-t-sm hover:text-gray-600  dark:hover:text-gray-300 " id="warehouse-tab" data-tabs-target="#warehouse" type="button" role="tab" aria-controls="warehouse" aria-selected="false">Warehouse</button>
                </li>

    {{-- // new Change --}}

                @if ($showStaging)
                    <li class="flex-grow" role="presentation">
                        <button class="w-[99%] p-4 hover:text-gray-600  dark:hover:text-gray-300" id="staging-tab" data-tabs-target="#staging" type="button" role="tab" aria-controls="staging" aria-selected="false">Staging</button>
                    </li>
                @endif

    {{-- // new Change --}}

            </ul>
        </div>




    <div id="myTabContent">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="warehouse" role="tabpanel" aria-labelledby="warehouse-tab">





        {{-- print all rack name on div of specific location name through controller --}}
        <div class="text-black text-lg grid lg:grid-cols-4 md:grid-cols-2">
            @foreach ($warehouseRacks as $rack)
            <a class=" text-black hover:text-black hover:no-underline" href="{{ route('viewRacks', ['id' => $rack->rack_id]) }}?locID={{ $id = request()->segment(2); }}">
                <div class=" bg-gray-200 shadow-md py-5 m-3 bg-grey text-center">
                    <p class="px-4 ">{{ $rack->rackName }}</p>
                </div>
            </a>
            @endforeach
        </div>


        </div>




        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="staging" role="tabpanel" aria-labelledby="staging-tab">


        {{-- print all rack name on div of specific location name through controller --}}
        <div class="text-black text-lg grid lg:grid-cols-4 md:grid-cols-2">
            @foreach ($stagingRacks as $rack)
            <a class=" text-black hover:text-black hover:no-underline" href="{{ route('viewRacks', ['id' => $rack->rack_id]) }}?locID={{ $id = request()->segment(2); }}">
                <div class=" bg-gray-200 shadow-md py-5 m-3 bg-grey text-center">
                    <p class="px-4 ">{{ $rack->rackName }}</p>
                </div>
            </a>
            @endforeach
        </div>



        </div>

    </div>



</div> {{--  this is closing div of header <div class="main"> --}}





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


    // This JavaScript code listens for a change in a select element, retrieves the selected option's value (which is expected to be a URL), and redirects the page
    // to that URL when a valid option is chosen, all without displaying a loading indication.


    // Get a reference to the select element
    var locationSelect = document.getElementById('location');

    // Add an event listener for the 'change' event
    locationSelect.addEventListener('change', function() {
        // Get the selected option's value
        var selectedUrl = locationSelect.value;

        // Check if a valid option is selected
        if (selectedUrl) {
            // Perform the redirection without loading indication
            window.location.replace(selectedUrl);
        }
    });






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


    // JavaScript to set the active tab on page load
    window.addEventListener('DOMContentLoaded', (event) => {
        // Set the active tab and show the corresponding tab content
        setActiveTab('warehouse-tab', 'warehouse');
    });

    function setActiveTab(tabId, tabContentId) {
        // Remove 'active' class from all tabs
        document.querySelectorAll('#myTab button').forEach(tab => {
            tab.classList.remove('active');
        });

        // Remove 'hidden' class from all tab contents
        document.querySelectorAll('#myTabContent > div').forEach(tabContent => {
            tabContent.classList.add('hidden');
        });

        // Add 'active' class to the specified tab
        document.getElementById(tabId).classList.add('active');

        // Remove 'hidden' class from the specified tab content
        document.getElementById(tabContentId).classList.remove('hidden');
    }





</script>



</body>
</html>
