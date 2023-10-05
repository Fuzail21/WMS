{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
@extends('layouts.header')

@section('title' , 'Dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
@endsection


@section('content')

@include('layouts.sidebar')


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
  </div>

      <div class="main grid lg:grid-cols-3 md:grid-cols-2 gap-5 py-5 mt-20 pr-6"> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




          <div class="dashboard-item py-5  ">
              <p class="px-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
          <div class="dashboard-item py-5  ">
              <p class="px-4"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
          <div class="dashboard-item py-5 ">
          <p class="px-4"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>

          <div class="dashboard-item py-5 ">
            <p class="px-4"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
        </div>
        <div class="dashboard-item py-5">
            <p class="px-4"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
        </div>
        <div class="dashboard-item py-5 ">
        <p class="px-4"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>

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
