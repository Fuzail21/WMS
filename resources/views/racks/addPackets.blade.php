{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
<html lang="en">

@extends('layouts.app')

@section('title' , 'New Rack')

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






    <div class="logo">
        <img class="" src="{{ asset('img/20-20-Logo-Color.png') }}" alt="20-20-Logo" width="170px">
    </div>
    {{-- <div>
        <p class="text-center pl-[35%] pt-4 pb-[-20%]" >Package ID:</p>
    </div> --}}

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">
                    Add Packet </div>

                <div class="card-body">
                    {{-- Form start --}}
                    <form method="POST" action="{{ route('add-packet') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Job Number</label>

                            <div class="col-md-6">
                                <input id="jobNumber" type="text" class="form-control" name="jobNumber"
                                value="{{ old('jobNumber') }}" required autofocus >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateIn" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Date In</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="dateIn" id="dateInput" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="material-type" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Material Type</label>

                            <div class="col-md-6">
                                <input id="material-type" type="text" class="form-control" name="material-type" required >

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="material-description" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Material Description</label>

                            <div class="col-md-6">
                                <input id="materialDescription" type="text" class="form-control" name="materialDescription"  required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numberofbundles" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Number Of Bundles</label>

                            <div class="col-md-6">
                                <input id="numberOfBundles" type="number" class="form-control" name="numberOfBundles"  required>
                            </div>
                        </div>
                        <input type="hidden" name="boxId" id="boxIdInput" value="{{ request()->query('boxId') }}">

                        <div class="row mb-0">
                            <div class="col-md-7 offset-md-4">
                                {{-- <button class="button">Add</button> --}}
                                <button class="button offset-md-8">Submit</button>
                            </div>

                        </div>

                        {{-- error handling if rackname already exist in same location  --}}
                        @if ($errors->has('rack_exists'))
                        <div class="alert alert-danger error">
                            {{ $errors->first('rack_exists') }}
                        </div>
                        @endif

                    </form>
                    {{-- form end --}}
                </div>
            </div>
        </div>
    </div>



</div> {{--  this is closing div of header <div class="main"> --}}

    <script>
        function updateDateField() {
            // Get the current date
            const currentDate = new Date();

          // Get the day, month, and year components
            const day = currentDate.getDate().toString().padStart(2, '0');
            const month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Note: Months are zero-based, so we add 1.
            const year = currentDate.getFullYear();

            // Format the date as "MM/DD/YYYY"
            const formattedDate = `${month}/${day}/${year}`;

            // Set the input field's value to the current date
            document.getElementById('dateInput').value = formattedDate;
        }

        // Call the function to update the date field when the page loads
        updateDateField();

    </script>
</body>
</html>
