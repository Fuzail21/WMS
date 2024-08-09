{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
<html lang="en">
    @extends('layouts.app')

    @section('title' , 'Location')

    @section('styles')
    <link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}">
    @endsection

    @section('content')

    @include('layouts.sidebar')

    <div class="slider d-flex align-items-center bg-[#f3f4f6]">
        <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
      </div>


<div class="main container"> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




    <div class="logo">
        <img class="" src="img/20-20-Logo-Color.png" alt="20-20-Logo" width="170px">
        </div>

   <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">Branch</div>

                    <div class="card-body">
                        {{-- THIS FORM ADD NEW PHYSCIAL LOCATION ON DATABASE  --}}
                        <form method="POST" action="{{ route('add-branch') }}"> {{--  FORM START --}}
                            @csrf

                            <div class="row mb-3">
                                <label for="location" class="col-md-4 col-form-label text-md-end"
                                    style="color:#0A1E61;">Location</label>

                                <div class="col-md-6">
                                    <input id="branchLocation" type="text" class="form-control" name="branchLocation" value=""
                                        required autocomplete="branchLocation" autofocus>

                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="button"> Add</button>
                                </div>
                            </div>
                        </form> {{--  FORM END --}}
                    </div>
                </div>
            </div>
    </div>

</div> {{--  this is closing div of header <div class="main"> --}}

</body>
</html>

{{-- @endsection --}}



