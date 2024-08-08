{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
@extends('layouts.header')

@section('title' , 'Dashboard')

@section('styles')

{{-- for azure live server --}}
{{-- <link rel="stylesheet" href="{{ secure_asset('css/slidebar.css') }}"> --}}

{{-- for local server --}}
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">

@endsection


@section('content')

@include('layouts.sidebar')


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
  </div>

              <div class="main grid lg:grid-cols-3 md:grid-cols-2 gap-5 mt-20 px-1 "> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
                {{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}


                <div class="parent-container flex justify-center ">
                    <div class="dashboard-item w-[95%] mx-auto bg-[#0A1E61] ">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $totalPackages }}</h3>
                            <p>Total Packages</p>
                        </div>
                    </div>
                </div>

                <div class="parent-container flex justify-center">
                    <div class="dashboard-item w-[95%] mx-auto bg-[#0A1E61]">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $totalPackets }}</h3>
                            <p>Total Packets</p>
                        </div>
                    </div>
                </div>

                <div class="parent-container flex justify-center">
                    <div class="dashboard-item w-[95%] mx-auto bg-[#0A1E61]">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $totalBoxes }}</h3>
                            <p>Total Boxes</p>
                        </div>
                    </div>
                </div>

                <div class="parent-container flex justify-center">
                    <div class="dashboard-item w-[95%] mx-auto bg-[#0A1E61]">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $totalRacks }}</h3>
                            <p>Total Racks</p>
                        </div>
                    </div>
                </div>

                <div class="parent-container flex justify-center">
                    <div class="dashboard-item w-[95%] mx-auto bg-[#0A1E61]">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $allLocation }}</h3>
                            <p>Total Locations</p>
                        </div>
                    </div>
                </div>

                <div class="parent-container flex justify-center">
                    <div class="dashboard-item w-[95%] mx-auto bg-[#0A1E61]">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $allBranchLocation }}</h3>
                            <p>Total Branch Locations</p>
                        </div>
                    </div>
                </div>

                <div class="parent-container flex justify-center">
                    <div class="dashboard-item w-[95%] mx-auto bg-yellow-500">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $lessThan5Days }}</h3>
                            <a href="{{ route('lessThanFiveDaysRecords') }}" ><p>Less than 5 days Remaining</p></a>
                        </div>
                    </div>
                </div>


                <div class="parent-container flex justify-center">
                    <div class="dashboard-item w-[95%] mx-auto bg-red-600">
                        <div class="inner text-center text-white py-3">
                            <h3>{{ $expiredPackages }}</h3>
                            <a href="{{ route('expiredPackages') }}" ><p>Date Out Expired</p></a>
                        </div>
                    </div>
                </div>


            </div>



  <script>

    // THIS WHOLE CODE FOR SLIDEBAR FOR OPEN ON HOVER AND CLOSED ON MOUSE LEAVE

    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.querySelector(".sidebar");
        const sidebarTitle = document.getElementById("sidebarTitle");

        // Toggle h2 element visibility on sidebar hover
        sidebar.addEventListener("mouseenter", function () {
            sidebarTitle.style.display = "block";
        });

        sidebar.addEventListener("mouseleave", function () {
            sidebarTitle.style.display = "none";
        });

    });
</script>

@endsection
