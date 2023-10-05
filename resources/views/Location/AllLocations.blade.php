{{-------------------------------------- Header it is same in all pages except login or register
-----------------------------------}}
<html lang="en">
@extends('layouts.app')

@section('title' , 'All Location')

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


<div class="main "> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
    {{-------------------------------------- Header it is same in all pages except login or register
    -----------------------------------}}

    @php
        $branchID = request()->route('branchID');
    @endphp

{{-- @dd($branchID); --}}
    <h1 class="text-center font-semibold">Locations</h1>

    <a href="{{ route('add-location') }}?branchID={{ $branchID }}">
    <button class="text-white bg-[#0A1E61] py-2 px-2 ml-[92%]">Add Location</button>
    </a>


    <div class="text-black text-lg grid grid-cols-3 ">


        {{-- this code generate div according to no. of location and inside div print location name through database an
        divs work like button--}}
        @foreach ($branchLocations as $location)
        <a class="text-black hover:text-black hover:no-underline"
            href="{{ route('viewAllRacks', ['locID' => $location->locID ]) }}">

            <div class=" bg-gray-200 shadow-md py-5 m-3 bg-grey text-center drop-shadow-lg">
                <p class="px-4 uppercase ">{{ $location->name }}</p> {{--  In this tag print location name through database --}}
            </div>
        </a>
        @endforeach
    </div>


</div> {{-- this is closing div of header <div class="main"> --}}



</body>
</html>
