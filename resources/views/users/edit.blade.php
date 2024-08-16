{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
@extends('layouts.header')

@section('title' , 'Edit User')

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

  </div>



            <div class="main gap-5 mt-10 px-1 "> {{--  THIS DIV INSIDE IN HEADER BEACUSE THIS div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
                {{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}




                <div class="w-full ">
                    <div class="w-full">
                        <!-- general form elements -->
                        <div class="bg-white shadow-md rounded-lg border-2">
                            <form method="post" action="{{ url('user/edit/'. $user->id) }}">
                                @csrf
                                <div class="p-6">
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                                        <input type="text" class="form-input w-full border border-gray-300 rounded-lg p-2" id="name" name="name" value="{{ old('name', $user->name) }}" required placeholder="Name">
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 font-bold mb-2">Email address</label>
                                        <input type="email" class="form-input w-full border border-gray-300 rounded-lg p-2" id="email" name="email" required value="{{ old('email', $user->email) }}" placeholder="Enter email">
                                        <p class="text-red-600 text-sm mt-2">{{ $errors->first('email') }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label for="designation" class="block text-gray-700 font-bold mb-2">Designation</label>
                                        <select name="designation" id="designation" class="form-select w-full border border-gray-300 rounded-lg p-2">
                                            <option {{ $user->designation == 'Admin' ? 'selected' : '' }} value="Admin">Admin</option>
                                            <option {{ $user->designation == 'User' ? 'selected' : '' }} value="User">User</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="account_status" class="block text-gray-700 font-bold mb-2">Account Status</label>
                                        <select name="account_status" id="account_status" class="form-select w-full border border-gray-300 rounded-lg p-2">
                                            <option {{ $user->is_deleted == '0' ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ $user->is_deleted == '1' ? 'selected' : '' }} value="1">Suspend</option>
                                        </select>
                                    </div>


                                    <div class="mb-4">
                                        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                                        <input type="password" class="form-input w-full border border-gray-300 rounded-lg p-2" id="password" name="password" placeholder="Password">
                                        <p class="text-gray-600 text-sm mt-2">Do you want to change the password? Please add a new password.</p>
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-6 rounded-b-lg">
                                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Update</button>
                                </div>
                            </form>
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
