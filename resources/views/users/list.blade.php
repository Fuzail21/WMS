{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
@extends('layouts.header')

@section('title' , 'All Users')

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



            <div class="main gap-5 mt-20 px-1 "> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
                {{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}


                <div class="flex m-3 mb-[2%]" >
                    <div class="ml-[30%] mr-5">
                        <img class="" src="{{ asset('img/20-20-Logo-Color.png') }}" alt="20-20-Logo" width="150px">
                    </div>
                    <div class="flex-1 pt-4">
                        <h5 class="pt-4 text-2xl text-black font-bold">Warehouse Management System</h5>
                    </div>
                </div>




                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>  
                @endif



                <div class="w-full overflow-x-auto">
                    <table class="w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 border-b text-left">Id</th>
                                <th class="py-3 px-4 border-b text-left">Name</th>
                                <th class="py-3 px-4 border-b text-left">Email</th>
                                <th class="py-3 px-4 border-b text-left">Designation</th>
                                <th class="py-3 px-4 border-b text-left">Account Status</th>
                                <th class="py-3 px-4 border-b text-left">Created At</th>
                                <th class="py-3 px-4 border-b text-left">Updated At</th>
                                <th class="py-3 px-4 border-b text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">{{ $user->id }}</td>
                                    <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                                    <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                                    <td class="py-3 px-4 border-b">{{ $user->designation }}</td>
                                    <td class="py-3 px-4 border-b {{ $user->is_deleted == '0' ? 'text-green-600' : 'text-red-500' }}">
                                        {{ $user->is_deleted == '0' ? 'Active' : 'Suspend' }}
                                    </td>

                                    <td class="py-3 px-4 border-b">{{ date('d-m-Y H:i A', strtotime($user->created_at)) }}</td>
                                    <td class="py-3 px-4 border-b">{{ date('d-m-Y H:i A', strtotime($user->updated_at)) }}</td>
                                    <td class="py-3 px-4 border-b min-w-[150px]" colspan="2">
                                        <a href="{{ url('user/edit/'. $user->id ) }}" class="bg-green-700 p-2 text-white rounded-lg">Edit</a>
                                        <a href="{{ url('user/delete/'. $user->id) }}" class="bg-red-600 p-2 text-white rounded-lg">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
