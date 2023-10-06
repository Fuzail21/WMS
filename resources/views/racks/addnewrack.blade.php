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
        <img class="" src="img/20-20-Logo-Color.png" alt="20-20-Logo" width="170px">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">
                    Add New Rack</div>

                <div class="card-body">
                    {{-- Form start --}}
                    <form method="POST" action="{{ route('addracks') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="rackName" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Rack Name</label>

                            <div class="col-md-6">
                                <input id="rackName" type="text" class="form-control" name="rackName"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rows" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Number
                                of Rows</label>

                            <div class="col-md-6">
                                <input id="rows" type="text" class="form-control" name="rows" value=""
                                    required autocomplete="rows">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="columns" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Number of Columns</label>

                            <div class="col-md-6">
                                <input id="columns" type="text" class="form-control" name="columns" required>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="innerBoxes" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Number of Inner Boxes</label>

                            <div class="col-md-6">
                                <input id="innerBoxes" type="text" class="form-control" name="innerBoxes" required
                                    autocomplete="innerBoxes">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Location</label>

                            <div class="col-md-6">

                                <select id="location" class="form-control" name="location" required>
                                    <option value="" disabled selected>Select a location</option>
                                    @foreach($location as $loc)
                                    <option class="capitalize" value="{{ $loc->locID }}">{{ $loc->name }}</option> {{-- this line of code display location name from database --}}
                                    @endforeach
                                </select>

                            </div>
                        </div>




                        <div class="radio-inputs col-md-6 offset-md-3 mb-2">
                            <label>
                                <input class="radio-input" type="radio" name="option" value="0">
                                    <span class="radio-tile">

                                    <span class="radio-label">Warehouse</span>
                                </span>
                            </label>
                            <label>
                                <input class="radio-input" type="radio" name="option" value="1">
                                <span class="radio-tile">
                                    <span class="radio-icon">

                                    <span class="radio-label">Staging</span>
                                </span>
                            </label>
                    </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="button">Submit</button>
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

// this code used for visible password through icons
const passwordInput = document.getElementById("password");
const passwordToggle = document.getElementById("password-toggle");

passwordToggle.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggle.textContent = "visibility_off";
  } else {
    passwordInput.type = "password";
    passwordToggle.textContent = "visibility";
  }
});

</script>



</body>
</html>
