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



    {{-- This code snippet generates a location selection dropdown with dynamically populated options for viewing racks in different locations. --}}

        <div class="d-flex align-items-center col-md-12">
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


    {{-- print all rack name on div of specific location name through controller --}}
    <div class="text-black text-lg grid grid-cols-4">
        @foreach ($racksAll as $rack)
        <a class=" text-black hover:text-black hover:no-underline" href="{{ route('viewRacks', ['id' => $rack->rack_id]) }}">
            <div class=" bg-gray-200 shadow-md py-5 m-3 bg-grey text-center">
                <p class="px-4 ">{{ $rack->rackName }}</p>
            </div>
        </a>
        @endforeach
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
</script>



</body>
</html>
