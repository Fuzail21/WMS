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
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($trashPackageDetails as $package)
                <tr>
                    <td>{{$package->pkgName }}</td>
                    <td>{{$package->pkgID }}</td>
                    <td>{{$package->boxName }}</td>
                    <td>{{$package->purchasingAgent }}</td>
                    <td>{{$package->pm }}</td>
                    <td>{{$package->dateIn }}</td>
                    <td>{{$package->expectedDateOut }}</td>
                    {{-- <td>
                        <a href="">
                            <button class="btn btn-danger edit-button" data-packetID="{{ $package->pkgID }} " onclick="editPacket()"><span class="material-symbols-outlined">
                                delete_forever
                                </span></button>
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
