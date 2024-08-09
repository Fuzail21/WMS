<html lang="en">

@extends('layouts.app')

@section('title' , 'New Rack')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/trashbutton.css') }}">
@endsection


@section('content')

@include('layouts.sidebar')


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main container">

    {{-- <div class=" mb-[2%] mt-1 ml-[140%]">
        <a href="{{url('/trash-package-details',)}}/{{$packageDetails[0]->boxId}}">
            <button class="delete-button">
                <svg class="delete-svgIcon" viewBox="0 0 448 512">
                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                </svg>
            </button>
        </a>
    </div> --}}

    <div>
        <h1 class="text-center ml-[50%]">PACKAGE DETAILS</h1>
    </div>

    <div class="ml-[25%] w-full">
        <table class="table ">
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Package ID</th>
                    <th>Box Name</th>
                    <th>Purchasing Agent</th>
                    <th>Project Manager</th>
                    <th>DateIn</th>
                    <th>Expected DateOut</th>

                </tr>
            </thead>
            <tbody>
                @foreach($packageDetails as $package)
                <tr>
                    <td>{{$package->pkgName }}</td>
                    <td>{{$package->pkgID }}</td>
                    <td>{{$package->boxName }}</td>
                    <td>{{$package->purchasingAgent }}</td>
                    <td>{{$package->pm }}</td>
                    <td>{{$package->dateIn }}</td>
                    <td>{{$package->expectedDateOut }}</td>


                    {{-- <td>
                        <a href="{{route('delete-packet', ['packetID' => $packet->packetID])}}">
                            <button class="btn btn-danger"><span class="material-symbols-outlined">delete</span></button>
                        </a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>


</div>


</body>
</html>
