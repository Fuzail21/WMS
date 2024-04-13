{{-------------------------------------- Header it is same in all pages except login or register
-----------------------------------}}
@extends('layouts.header')

@section('title' , 'Racks')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">



<style>
    @media only screen and (max-width: 1024px)
    /* @media only screen and (min-width: 300px) and (max-width: 1024px) */ {

    .main {
    overflow-x: scroll; /* Enable horizontal scrollbar */
    min-width: 400%; /* Set minimum width to viewport width */
    padding-bottom: 20px; /* Add some bottom padding to make room for scrollbar */
    padding-left: 15%;
}

.parent-box {
    overflow: hidden; /* Remove overflow on boxes */
}

.slider{
    min-width: 400%;
}
.child-box{
    min-width: 40%;
}


}
    </style>



@endsection

@section('content')

@if(isset($rackId))
@include('layouts.sidebar', ['id' => $rackId])
@endif

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Add this line -->
@endsection




<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>


<div class="main w-[87%] mx-auto text-white  @if($rackStructure[0]->columns > 8) text-[#ADEFD1FF] ml-[7%] w-full @endif">  {{-- THIS DIV INSIDE IN HEADER BEACUSE THIS <div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}
    {{-------------------------------------- Header it is same in all pages except login or register
    -----------------------------------}}



    {{------------- The code generates a dynamic layout to display racks and their labeled inner boxes using HTML and
    Blade
    syntax. ---------}}

    <h1 class="text-center text-black text-3xl font-bold">RACK {{ $racks[0]->rackName }}</h1>


 {{-- this code generate columns & rows according to data --}}
@for($rowsLoop = 1; $rowsLoop <= $rackStructure[0]->rows; $rowsLoop++)
    <div class="grid grid-cols-{{ $rackStructure[0]->columns }} gap-1 ">
        @for($columnsLoop = 1; $columnsLoop <= $rackStructure[0]->columns; $columnsLoop++)


         {{-- <div class="flex overflow-x-auto max-w-full">
          <div class="grid grid-cols-8 gap-1"> --}}

            <div class="wrapper">
                <div class="content">







            <div class="bg-[#ADEFD1FF] my-2 parent-box min-w-fit px-4 pb-2  @if($rackStructure[0]->columns > 8) text-[#ADEFD1FF] w-35 @endif" >
                <h1 class="pb-3 text-center"></h1>

                {{-- this code generate innerBoxes according to data --}}
                <div class="grid grid-cols-{{ $rackStructure[0]->innerBoxes }} inline gap-2 ">
                    @for($boxesLoop = 1; $boxesLoop <= $rackStructure[0]->innerBoxes; $boxesLoop++)

                        <div class="inline bg-[#00203FFF] py-2 border border-white text-center child-box @if($rackStructure[0]->columns > 8) text-[#ADEFD1FF] w-27.5 @endif">
                            <p class="new-name-display text-xs text-[#F9F6EE]" id="newNameDisplay-{{ $rowsLoop }}-{{ $columnsLoop }}-{{ $boxesLoop }}">

                                {{--
                                this p tag display name after assign
                                --}}

                                {{-- this php code hide button after display name after assign --}}
                                @php
                                $boxNameFound = false;
                                $packageAdded = false;
                                $packetAdded = false;

                                foreach ($boxData as $box) {
                                    if ($box['row_position'] == $rowsLoop && $box['column_position'] == $columnsLoop && $box['innerBox_position'] == $boxesLoop) {


                                        echo '<span style="font-weight: bold; font-size:110%;">' . $box['boxName'] . '</span><br>';


                                        $boxid_from_foreach = $box['boxId'];
                                        $boxNameFound = true;

                                        // Now here we are checking for packages in our box using boxID which is a PK in BOXES table and FK in Packages table
                                        // If boxID matched and package found in database the package name will be printed here, otherwise the packageAdded flag will be false
                                        // and Add Package text will be appear to add a new package.
                                        foreach ($packages as $package) {
                                            if ($package['boxId'] == $box['boxId']) {
                                                // Found the matching array, print the "pkgName"


                                                echo $package['pkgName']. '<br>';
                                                $pkgIDs = $package['pkgID'];
                                                $packageAdded = true;

                                                // Now check for packets in the package using packageID which is a PK in Packages table and FK in Packets table
                                                // If packageID matched and packets found in the database, set the $packetAdded flag to true.
                                                foreach ($packets as $packet) {
                                                    if ($packet['pkgID'] == $package['pkgID']) {
                                                        $packetAdded = true;
                                                        // break; // Exit the loop once a match is found
                                                    }
                                                }

                                if ($packages->count() > 1) {
                                    $bgcolor = 'bg-[00203FFF]text-white';
                                }
                                    $days='';
                                    if ($packages->count() > 1) {
                                        $date = date("Y-m-d");
                                        $date1 = date_create($date);

                                        $dateFromDB = date_create($package->expectedDateOut)->format("Y-m-d");
                                        $date2 = date_create($dateFromDB);


                                        $interval = $date1->diff($date2);
                                        $days = $interval->format('%R%a');
                                    }

                                    if ($days >= 7) {
                                        $bgcolor = 'bg-[2ECC71] text-black';
                                    } elseif ($days < 7 && $days > 0) {
                                        $bgcolor = 'bg-[#FFBF00] text-black';
                                    } else {
                                        $bgcolor = 'bg-[#D42A46] text-black';
                                    }

                                        // echo '<div class="' . $bgcolor . '"  style="position:relative; align:center;">'. $days;
                                        echo '<div class="' . $bgcolor . ' package-days" style="position:relative; align:center;">'. $days;
                                        echo '</div>';

                                    break; // Exit the package loop once a match is found
                                        }
                                    }
                                }
                            }
                            @endphp
                            </p>

                            {{-- Check if a name is not assigned --}}
                            @if (!$boxNameFound && !$packageAdded)
                            {{-- Show the Assign Button --}}
                            <button type="button"
                                class=" text-black bg-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-0.5 m-[1]
                                @if($rackStructure[0]->columns > 8) text-white bg-transparent py-1 m-[-3] @endif "
                                data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                data-value4="{{ $rackId }}"
                                onclick="openPopup(event, '{{ $rowsLoop }}', '{{ $columnsLoop }}', '{{ $boxesLoop }}')">Assign Name
                            </button>

                            @elseif($boxNameFound && !$packageAdded)
                            {{-- Show the Add Packager button --}}
                            <a href="{{ route('add-package') }}?boxId={{ $boxid_from_foreach}}">
                                <button type="button"
                                    class="text-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-1"
                                    data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                    data-value4="{{ $rackId }}"
                                    data-boxid="{{ $boxid_from_foreach }}" data-boxName="{{ $box['boxName'] }}">Add
                                </button>
                            </a>

                            @elseif($boxNameFound && $packageAdded && !$packetAdded)
                            {{-- Show the Add Packets button --}}
                            <a href="{{ route('add-packet') }}?boxId={{ $boxid_from_foreach }}">
                                <button type="button"
                                    class="text-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-1"
                                    data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                    data-value4="{{ $rackId }}"
                                    data-boxid="{{ $boxid_from_foreach }}">Add
                                </button>
                            </a>

                            {{-- <button type="button"
                                    class="text-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-1"
                                    data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                    data-value4="{{ $rackId }}" data-value5="{{ $pkgIDs }}"
                                    data-boxid="{{ $boxid_from_foreach }}" data-url="{{ url('/delete-packet') }}/{{ $package->pkgID }}?boxid={{ $boxid_from_foreach }}"  onclick="toggleModal('{{ $pkgIDs }}')">Remove
                                </button> --}}


                            @elseif($boxNameFound && $packageAdded && $packetAdded)
                            {{-- Show the Details button if packets have been added --}}

                            <div class="detail-btn">
                                <a href="{{url('/package-details',)}}/{{$boxid_from_foreach}}">
                                    <button type="button"
                                        class="text-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-0"
                                        data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                        data-value4="{{ $rackId }}"
                                        data-boxid="{{ $boxid_from_foreach }}">Details
                                    </button>
                                </a>
                            </div>

                            <a class="add-btn" href="{{ route('add-packet') }}?boxId={{ $boxid_from_foreach }}">
                                <button type="button"
                                    class="text-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-1"
                                    data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                    data-value4="{{ $rackId }}"
                                    data-boxid="{{ $boxid_from_foreach }}">Add
                                </button>
                            </a>

                            <a class="update-btn" href="{{ route('packets-details', ['pkgId' => $pkgIDs])}}?locID={{ $id = request()->input('locID'); }}&rackId={{ $id = $rackId }}">
                                <button type="button"
                                    class="text-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-10.5"
                                    data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                    data-value4="{{ $rackId }}"
                                    data-boxid="{{ $boxid_from_foreach }}">Update
                                </button>
                            </a>

                                <button type="button"
                                    class="text-[#ADEFD1FF] focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs py-1 px-1 remove-btn"
                                    data-value1="{{ $rowsLoop }}" data-value2="{{ $columnsLoop }}" data-value3="{{ $boxesLoop }}"
                                    data-value4="{{ $rackId }}" data-value5="{{ $pkgIDs }}"
                                    data-boxid="{{ $boxid_from_foreach }}" data-url="{{ url('/delete-packet') }}/{{ $package->pkgID }}?boxid={{ $boxid_from_foreach }}"  onclick="toggleModal('{{ $pkgIDs }}')">Remove
                                </button>





                                <section>
                                    <div class="rt-container">
                                        <div class="col-rt-12">
                                            <div class="Scriptcontent">
                                                <!-- Login Form Popup HTML -->

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
                                                        <!--  Relocate To WMS  -->
                                                        <input class="radio" id="tab-1" name="tabs-name" type="radio" checked>
                                                        <label for="tab-1" class="table "><span class="fa">Relocate To WMS</span></label>
                                                        <div class="tabs-content" style="padding-top:10%;">


                                                                    <div class="card">
                                                                        <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">Update Box Location</div>

                                                                        <div class="card-body">

                                                                            <form method="POST" action="{{ route('Package-relocateToWMS') }}">
                                                                                @csrf
                                                                                <input id="boxNameInput" type="search" class="form-control text-black px-3 mb-2 mt-2 " name="boxName" placeholder="Box Name:" required autocomplete="off" autofocus>
                                                                                    @foreach ($allBoxNames as $boxName)

                                                                                    @endforeach

                                                                                <div id="boxNameDropdown" class="bg-white border rounded-lg mt-2 hidden">
                                                                                  <ul id="boxNameList" class="text-black text-lg" style="max-height: 200px; overflow-y: auto;">{{ $boxName }}</ul>
                                                                                </div>

                                                                                <input type="hidden" name="pkgID" id="pkgIDInput1" value="">
                                                                                <input type="hidden" name="rackId" id="rackIdInput" value="{{ $id = request()->segment(2); }}">

                                                                                    <div class="col-md-6 offset-md-4 pt-2" >
                                                                                        <button class="button text-white bg-[#00203F] py-2 px-2">Submit</button>
                                                                                    </div>
                                                                                    @if(session('error'))
                                                                                        <div class="alert alert-danger">
                                                                                            {{ session('error') }}
                                                                                        </div>
                                                                                    @endif
                                                                                    @if(session('success'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('success') }}
                                                                    </div>
                                                                @endif
                                                                                </div>
                                                                            </form>
                                                                        </div>




                                                        </div>
                                                        <!--  Shipping To Job  -->
                                                        <input class="radio" id="tab-2" name="tabs-name" type="radio">
                                                        <label for="tab-2" class="table"><span class="fa fa-truck ">Shipping To Job</span></label>
                                                        <div class="tabs-content">
                                                            <div class="row justify-content-center">
                                                                <div class="col-md-10">
                                                                    <div class="card">
                                                                        <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62; padding-top: 2%;">
                                                                            Removing Package </div>

                                                                        <div class="card-body" style="padding-top: 3%;">
                                                                            <!-- {{-- Form start --}} -->
                                                                            <form method="POST" action="{{ route('shipToJob') }}" class="text-black">
                                                                             @csrf


                                                                                    <label for="dateIn" class="col-md-4 col-form-label text-md-end font-semibold" style="color:#0A1E61; text-align:left; ">Date Out</label>

                                                                                    <input type="text" class="form-control" name="dateOut" id="dateInput" value="" autocomplete="off">


                                                                                    <label for="jobName" class="col-md-4 col-form-label text-md-end font-semibold"
                                                                                        style="color:#0A1E61; text-align:left;">Driver:</label>

                                                                                        <input id="driver" type="text" class="form-control" name="removingDriver" value=""  autocomplete="off" >


                                                                                    <label for="location" class="col-md-4 col-form-label text-md-end font-semibold" style="color:#0A1E61; text-align:left;">Location:</label>

                                                                                        <input id="location" type="text" class="form-control" name="deliveryLocation" value="" autocomplete="off">



                                                                                    <label for="note" class="col-md-4 col-form-label text-md-end font-semibold" style="color:#0A1E61; text-align:left;">Note:</label>

                                                                                        <input id="note" type="text" class="form-control" name="removingNote"  value="" autocomplete="off">


                                                                                    <label for="truckNumber" class="col-md-4 col-form-label text-md-end font-semibold" style="color:#0A1E61; text-align:left;">Truck Number:</label>


                                                                                        <input id="truckNumber" type="text" class="form-control " name="truckNumber"  value="" autocomplete="off">

                                                                                        <input type="hidden" name="pkgID" id="pkgIDInput" value="">
                                                                                        <input type="hidden" name="rackId" id="rackIdInput" value="{{ $id = request()->segment(2); }}">


                                                                                    <div class="col-md-7 offset-md-4">
                                                                                        <button class="button offset-md-8 text-white bg-[#00203F] py-2 px-2" onclick="shippingToJob()">Remove</button>


                                                                                <!-- {{-- error handling if rackname already exist in same location  --}}
                                                                                @if ($errors->has('rack_exists'))
                                                                                <div class="alert alert-danger error">
                                                                                    {{ $errors->first('rack_exists') }}
                                                                                </div>
                                                                                @endif -->

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                         @endif

                        </div>
                    @endfor
                </div>
            </div>


          </div>
         </div>




        @endfor
    </div>
@endfor
    </div>

    </div>
</div> {{-- this is closing div of header <div class="main"> --}}


    <script src='https://use.fontawesome.com/7fcc5972f1.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

// This JavaScript function opens a popup for entering a new name, sends the data via AJAX to a specified route, and handles the response, including
//  redirection when necessary.

        // j, i, k stands for 'row', 'column', 'inner boxes'
        function openPopup(event, j, i, k) {
        event.preventDefault();

        // here i can fetch data from button
        const button = event.target;
        const rows = button.getAttribute("data-value1");
        const columns = button.getAttribute("data-value2");
        const innerBoxes = button.getAttribute("data-value3");
        const rackId = button.getAttribute("data-value4");

        const displayId = `newNameDisplay-${j}-${i}-${k}`;


        // its a SWEET ALERT starts
        Swal.fire({
            title: 'Assign a New Name',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            confirmButtonText: 'Submit',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            preConfirm: (newName) => {

                 // Get the CSRF token value from a meta tag
                const csrfToken = $('meta[name="csrf-token"]').attr('content'); //csrf token generate for form


                // Ajax Start
                $.ajax({
                url: '{{ route("save.data") }}',
                method: 'POST',
                data: {
                    rackId: rackId,
                    rowPosition: rows,
                    columnPosition: columns,
                    innerBoxPosition: innerBoxes,
                    name: newName,
                },

                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Include the CSRF token here
                },

                success: function(response) {
                    if (response.redirect) {
                    // Redirect to the specified route
                      // Extract rackID from the URL
                     const url = new URL(response.redirect);
                     const rackID = url.searchParams.get('rackID');

                     // Check if rackID is available
                     if (rackID) {
                         // Use the rackID as needed
                         console.log('Rack ID:', rackID);
                     }

                     // Redirect to the specified route
                     window.location.href = response.redirect;
                    } else {
                    // Handle success here if needed
                    }

                },
                // error handling if data not insert in database table
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error:', errorThrown);
                    // Display an error message to the user
                    alert('An error occurred while saving the data. Please try again later.');
                }

            });
            // Ajax End
            }
            // Sweet alert end
        });
    }

    //----------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ----------------------------------------------------------------------------






    // ------------------------------------------------------------ this code will get today/current date and show on forms feild ------------------------------------------------------

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

    //----------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ----------------------------------------------------------------------------




// this code will apply on inside whole innerbox for background according to pkg days in package -------------------------------------

    document.querySelectorAll('.package-days').forEach(function(days) {
        const packageDaysBackgroundColor = getComputedStyle(days).backgroundColor;
        days.parentElement.style.backgroundColor = packageDaysBackgroundColor;
});

//----------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ----------------------------------------------------------------------------





    // this function call when user click on delete button on innerBox and it can show popup and switch tab and inside function send pkgID as a parameter ------------------------------

    function toggleModal(pkgIDs) {
        var modalToggle = document.getElementById("modal-toggle");
        modalToggle.checked = !modalToggle.checked;

        const pkgId = document.getElementById("pkgIDInput").value = pkgIDs;
        const pkgId1 = document.getElementById("pkgIDInput1").value = pkgIDs;
    }

    //----------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ----------------------------------------------------------------------------





    // this javascript code just saved all values from form input in popop tab shipping to job and check 2 feild dateOut and removingDriver if empty so it can show alert ------------


    function shippingToJob() {

        var id = document.getElementById("pkgIDInput");
        var date = document.getElementById("dateInput");
        var driverName = document.getElementById("driver");
        var location = document.getElementById("location");
        var note = document.getElementById("note");
        var truck = document.getElementById("truckNumber");

        const pkgID = id.value;
        const dateOut = date.value;
        const removingDriver = driverName.value;
        const deliveryLocation = location.value;
        const removingNote = note.value;
        const truckNumber = truck.value;

        if(dateOut == '' || removingDriver == '' )
        {
            console.log(dateOut, pkgID);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please Enter Complete Data!',
            })
            return false;
        }
    }

    //----------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ----------------------------------------------------------------------------







    //  this javascript code show list of boxName in popup after click on remove button and inside the Relocate to WMS tab when user type something inside the feild this code filtered
    // allBoxName and show only those box name according to input text -----------------------------------------------------------------------

    var allBoxNames = @json($allBoxNames); // Your Laravel array of box names

    var boxNameInput = document.getElementById("boxNameInput");
    var boxNameDropdown = document.getElementById("boxNameDropdown");
    var boxNameList = document.getElementById("boxNameList");

    boxNameInput.addEventListener("input", function () {
        // alert("Input event triggered.");
        var query = this.value.trim().toLowerCase();
        var filteredBoxNames = allBoxNames.filter(function (boxName) {
            return boxName.toLowerCase().includes(query);
        });

        displayFilteredBoxNames(filteredBoxNames);
    });

    function displayFilteredBoxNames(results) {
        boxNameList.innerHTML = ""; // Clear previous results

        if (results.length > 0) {
            results.forEach(function (boxName) {
                var listItem = document.createElement("li");
                listItem.textContent = boxName;
                listItem.addEventListener("click", function () {
                    boxNameInput.value = boxName;
                    boxNameDropdown.classList.add("hidden");
                });
                boxNameList.appendChild(listItem);
            });

            boxNameDropdown.classList.remove("hidden");
        } else {
            boxNameDropdown.classList.add("hidden");
        }
    }

    // Close the dropdown when clicking outside of it
    document.addEventListener("click", function (event) {
        if (!boxNameDropdown.contains(event.target) && event.target !== boxNameInput) {
            boxNameDropdown.classList.add("hidden");
        }
    });

    // Prevent the dropdown from closing when clicking inside it
    boxNameDropdown.addEventListener("click", function (event) {
        event.stopPropagation();
    });



//----------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ----------------------------------------------------------------------------


    </script>



@endsection
