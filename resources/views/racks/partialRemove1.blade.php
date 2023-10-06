{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
<html lang="en">

@extends('layouts.app')

@section('title' , 'Partial Remove1')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}">
<link rel="stylesheet" href="{{ asset('css/partialRemovePopup.css') }}">
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
                    Packet Details </div>

                <div class="card-body">
                    {{-- Form start --}}
                    <form method="POST" action="">
                        @csrf

                        <div class="row mb-3">
                            <label for="jobName" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Job Number</label>

                            <div class="col-md-6">
                                <input id="jobName" type="text" class="form-control" name="jobName"
                                value="{{isset($packetDetails) ? $packetDetails->jobNumber : ''}}" required autofocus >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="material-type" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Material Type</label>

                            <div class="col-md-6">
                                <input id="material-type" type="text" class="form-control" name="material-type" value="{{isset($packetDetails) ? $packetDetails->materialType : ''}}" required >

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="material-description" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Material Description</label>

                            <div class="col-md-6">
                                <input id="materialDescription" type="text" class="form-control" name="materialDescription"  value="{{isset($packetDetails) ? $packetDetails->materialDescription : ''}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numberofbundles" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Number Of Bundles</label>

                            <div class="col-md-6">
                                <input id="numberOfBundles" type="number" class="form-control" name="numberOfBundles"  value="{{isset($packetDetails) ? $packetDetails->numberOfBundles : ''}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="removeBundles" class="col-md-4 col-form-label text-md-end"
                                style="color:#0A1E61;">Remove Number Of Bundles</label>

                            <div class="col-md-6">
                                <input id="removeBundles" type="number" class="form-control" name="removeBundles" required>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="modifiedDate" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Modification Date</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="modifiedDate" id="dateInput" value="">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <a href="">
                                    <button class="button offset-md-8" onclick="toggleModal()">Submit</button>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <section>
        <div class="rt-container">
            <div class="col-rt-12">
                <div class="Scriptcontent">

                    <input id="modal-toggle" type="checkbox">
                    <label class="modal-backdrop" for="modal-toggle"></label>
                    <div class="modal-content">
                        <label class="modal-close-btn" for="modal-toggle">
                            <svg width="30" height="30">
                                <line x1="5" y1="5" x2="20" y2="20"/>
                                <line x1="20" y1="5" x2="5" y2="20"/>
                            </svg>
                        </label>
                        <div class="tabs">
                            <!-- Tab 1 -->
                            <input class="radio" id="tab-1" name="tabs-name" type="radio" checked>
                            <label for="tab-1" class="table"><span class="fa"> Staging Area </span></label>
                            <div class="tabs-content" style="padding-top:10%;">
                                <div class="card">
                                    <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">STAGING DETAILS</div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <input id="boxNames" type="text" class="form-control" name="boxNames" value="" placeholder="Box Name" required autocomplete="off" autofocus>
                                            <input id="jobName" type="text" class="form-control" name="jobName" value="" placeholder="Job Number" required autocomplete="off" autofocus>

                                            <div class="col-md-6 offset-md-4">
                                                <button class="button">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 2 -->
                            <input class="radio" id="tab-2" name="tabs-name" type="radio">
                            <label for="tab-2" class="table"><span class="fa fa-truck">Shipping To Job</span></label>
                            <div class="tabs-content">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62; padding-top: 2%;">
                                                SHIPPING DETAILS
                                            </div>
                                            <div class="card-body" style="padding-top: 3%;">
                                                <form method="POST" action="{{ route('add-packet') }}">
                                                    <input id="driverName" type="text" class="form-control" name="driverName" value="" placeholder="Driver Name" required autocomplete="off" autofocus>
                                                    <input id="truckNumber" type="text" class="form-control" name="truckNumber" value="" placeholder="Truck Number" required autocomplete="off" autofocus>
                                                    <input id="location" type="text" class="form-control" name="location" value="" placeholder="Location" required autocomplete="off" autofocus>

                                                    <div class="col-md-7 offset-md-4">
                                                        <button class="button offset-md-8">Remove</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 3 -->
                            <input class="radio" id="tab-3" name="tabs-name" type="radio">
                            <label for="tab-3" class="table"><span class="fa">Relocate to WMS</span></label>
                            <div class="tabs-content" style="padding-top:10%;">
                                <div class="card">
                                    <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">RELOCATION FORM</div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <input id="boxNames" type="text" class="form-control" name="boxNames" value="" placeholder="Box Name" required autocomplete="off" autofocus>
                                            <input id="jobName" type="text" class="form-control" name="jobName" value="" placeholder="Job Number" required autocomplete="off" autofocus>

                                            <div class="col-md-6 offset-md-4">
                                                <button class="button">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>










</div> {{--  this is closing div of header <div class="main"> --}}

    <script src='https://use.fontawesome.com/7fcc5972f1.js'></script><script  src="./script.js"></script>
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





    function toggleModal() {
        var modalToggle = document.getElementById('modal-toggle');
        modalToggle.checked = !modalToggle.checked;
    }






    </script>
</body>
</html>
