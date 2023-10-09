{{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}
<html lang="en">

@extends('layouts.app')

@section('title' , 'New Rack')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}">
@endsection


@section('content')

@include('layouts.sidebar')


<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main container">




    <div class="border-gray-200 bg-gray-50 dark:border-gray-700 w-[160%]">
        <ul class="flex text-md font-medium text-center" id="myTab" role="tablist">
            {{-- <li class="flex-grow" role="presentation">
                <button class="w-[99%] p-4 border-b-1 rounded-t-sm" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Staging Area</button>
            </li> --}}
            <li class="flex-grow" role="presentation">
                <button class="w-[99%] p-4 rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Shipping To Job</button>
            </li>
            <li class="flex-grow" role="presentation">
                <button class=" w-[99%] p-4 rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300" id="relocate-tab" data-tabs-target="#relocate" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Relocate to WMS</button>
            </li>
        </ul>
    </div>

    <div id="myTabContent" >



        {{-- <div class="hidden p-4 rounded-lg h-full w-full" id="profile" role="tabpanel" aria-labelledby="profile-tab">


            <div class="logo">
                <img class="" src="img/20-20-Logo-Color.png" alt="20-20-Logo" width="170px">
            </div>


            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">
                            Staging Area</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('packet-stagingArea') }}">
                                @csrf

                                <div class="row mb-3 ">
                                    <label for="boxName" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Box Name</label>
                                    @foreach ($allStagingBoxNames as $boxName)

                                        @endforeach
                                    <div class="col-md-6 position-relative ">
                                        <input id="boxNameInput" type="search" class="form-control col-form-label text-md-end" name="boxName" placeholder="" required autocomplete="off" autofocus>
                                        <div id="boxNameDropdown" class="bg-white border rounded-lg mt-2 position-absolute hidden" style="min-width: 100%; z-index: 1; top: auto; bottom: 100%;"> <!-- Make dropdown absolute positioned -->
                                            <ul id="boxNameList" class="text-black text-lg" style="max-height: 200px; overflow-y: auto; list-style: none; padding: 1%;">{{ $boxName }}</ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <label for="jobNumber" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Job Number</label>
                                    @foreach ($allStagingBoxNames as $boxName)

                                        @endforeach
                                        <select id="jobNumberDropdown" class="form-control w-50" >
                                            <option value="">Select Job Number</option>
                                        </select>
                                </div>

                                <input type="hidden" name="jobNumber" id="" value="{{ $jobNumber }}">
                                <input type="hidden" name="materialType" id="" value="{{ $materialType }}">
                                <input type="hidden" name="materialDescription" id="" value="{{ $materialDescription }}">
                                <input type="hidden" name="numberOfBundles" id="" value="{{ $numberOfBundles }}">
                                <input type="hidden" name="removeBundles" id="" value="{{ $removeBundles }}">
                                <input type="hidden" name="modifiedDate" id="" value="{{ $modifiedDate }}">
                                <input type="hidden" name="packetID" id="" value="{{ $packetID }}">


                                <div class="row mb-0 ">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="button">Submit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div> --}}





        <div class="hidden p-4 rounded-lg h-full w-full" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">



            <div class="logo">
                <img class="" src="img/20-20-Logo-Color.png" alt="20-20-Logo" width="170px">
            </div>


            <div class="row justify-content-center ">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">
                            Shipping Details</div>

                        <div class="card-body">
                            {{-- Form start --}}
                            <form method="POST" action="{{ route('packet-shipToJob') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="driverName" class="col-md-4 col-form-label text-md-end"
                                        style="color:#0A1E61;">Driver Name</label>

                                    <div class="col-md-6">
                                        <input id="driverName" type="text" class="form-control" name="driverName"
                                            value="" required autocomplete="off" autofocus>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="truckNumber" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Truck Number</label>

                                    <div class="col-md-6">
                                        <input id="truckNumber" type="text" class="form-control" name="truckNumber" value=""
                                            required autocomplete="off">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="location" class="col-md-4 col-form-label text-md-end"
                                        style="color:#0A1E61;">Location</label>

                                    <div class="col-md-6">
                                        <input id="location" type="text" class="form-control" name="location" required>

                                    </div>
                                </div>

                                <input type="hidden" name="jobNumber" id="" value="{{ $jobNumber }}">
                                <input type="hidden" name="materialType" id="" value="{{ $materialType }}">
                                <input type="hidden" name="materialDescription" id="" value="{{ $materialDescription }}">
                                <input type="hidden" name="numberOfBundles" id="" value="{{ $numberOfBundles }}">
                                <input type="hidden" name="removeBundles" id="" value="{{ $removeBundles }}">
                                <input type="hidden" name="modifiedDate" id="" value="{{ $modifiedDate }}">
                                <input type="hidden" name="packetID" id="" value="{{ $packetID }}">


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="button">Submit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>







        <div class="hidden p-4 rounded-lg h-full w-full" id="relocate" role="tabpanel" aria-labelledby="dashboard-tab">



            <div class="logo">
                <img class="" src="img/20-20-Logo-Color.png" alt="20-20-Logo" width="170px">
            </div>


            <div class="row justify-content-center ">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">
                            Relocate To WMS</div>

                        <div class="card-body">
                            {{-- Form start --}}
                            <form method="POST" action="">
                                @csrf

                                <div class="row mb-3">
                                    <label for="boxName" class="col-md-4 col-form-label text-md-end"
                                        style="color:#0A1E61;">Branch Location</label>

                                        @foreach ($branchLocation as $branches)

                                        @endforeach
                                    <div class="col-md-6 ">
                                        <input type="search" class="form-control col-form-label text-md-end" name="branchLocation" list="branchLocation" id="branch" autocomplete="off"/>
                                            <datalist id="branchLocation">
                                                <option value="{{ $branches }}"></option>
                                            </datalist>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="jobNumber" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Location</label>

                                    {{-- @foreach ($locationName as $location)

                                    @endforeach --}}
                                <div class="col-md-6 ">
                                    <input type="search" class="form-control col-form-label text-md-end" name="location" list="location" id="location" autocomplete="off"/>
                                        <datalist id="location">
                                            <option id="Loc" value=""></option>
                                        </datalist>
                                </div>
                                </div>



                                <div class="radio-inputs col-md-6 offset-md-3 mb-2">
                                    <label>
                                        <input class="radio-input" type="radio" name="option" value="0">
                                            <span class="radio-tile">

                                            <span class="radio-label">Warehouse</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="radio" name="option" value="1">
                                        <span class="radio-tile">
                                            <span class="radio-icon">

                                            <span class="radio-label">Staging</span>
                                        </span>
                                    </label>
                            </div>



                                <div class="row mb-3">
                                    <label for="boxName" class="col-md-4 col-form-label text-md-end"
                                        style="color:#0A1E61;">Rack Name</label>

                                    <div class="col-md-6">
                                        <input id="boxName" type="text" class="form-control" name="boxName"
                                            value="" required autocomplete="off" autofocus>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="boxName" class="col-md-4 col-form-label text-md-end"
                                        style="color:#0A1E61;">Box Name</label>

                                    <div class="col-md-6">
                                        <input id="boxName" type="text" class="form-control" name="boxName"
                                            value="" required autocomplete="off" autofocus>
                                    </div>
                                </div>



                                <div class="radio-inputs col-md-6 offset-md-3 mb-2">
                                    <label>
                                        <input class="radio-input" type="radio" name="option" value="0">
                                            <span class="radio-tile">

                                            <span class="radio-label">Existing</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="radio" name="option" value="1">
                                        <span class="radio-tile">
                                            <span class="radio-icon">

                                            <span class="radio-label">New</span>
                                        </span>
                                    </label>
                            </div>



                                <div class="row mb-3">
                                    <label for="boxName" class="col-md-4 col-form-label text-md-end"
                                        style="color:#0A1E61;">Job Number</label>

                                    <div class="col-md-6">
                                        <input id="boxName" type="text" class="form-control" name="boxName"
                                            value="" required autocomplete="off" autofocus>

                                    </div>
                                </div>



                                <input type="hidden" name="jobNumber" id="" value="{{ $jobNumber }}">
                                <input type="hidden" name="materialType" id="" value="{{ $materialType }}">
                                <input type="hidden" name="materialDescription" id="" value="{{ $materialDescription }}">
                                <input type="hidden" name="numberOfBundles" id="" value="{{ $numberOfBundles }}">
                                <input type="hidden" name="removeBundles" id="" value="{{ $removeBundles }}">
                                <input type="hidden" name="modifiedDate" id="" value="{{ $modifiedDate }}">
                                <input type="hidden" name="packetID" id="" value="{{ $packetID }}">


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="button">Submit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>





</div>{{------- main div -------}}


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://use.fontawesome.com/7fcc5972f1.js'></script>
<script>



       $(document).ready(function () {
  // Add a click event handler for the tab buttons
  $("button[role='tab']").click(function () {
    // Get the target content ID from the data-tabs-target attribute
    var targetContentId = $(this).attr("data-tabs-target");

    // Hide all content divs
    $("div[role='tabpanel']").addClass("hidden");

    // Show the selected content
    $(targetContentId).removeClass("hidden");

    // Remove the "aria-selected" attribute from all buttons
    $("button[role='tab']").attr("aria-selected", "false");

    // Set the "aria-selected" attribute for the clicked button to "true"
    $(this).attr("aria-selected", "true");
  });
});







var allbranchLocation = @json($branchLocation); // Your Laravel array of box names

    var branchLocationInput = document.getElementById("branchLocationInput");
    var branchLocationDropdown = document.getElementById("branchLocationDropdown");
    var branchLocationList = document.getElementById("branchLocationList");

    branchLocationInput.addEventListener("input", function () {
        // alert("Input event triggered.");
        var query = this.value.trim().toLowerCase();
        var filteredBoxNames = allbranchLocation.filter(function (boxName) {
            return boxName.toLowerCase().includes(query);
        });

        displayFilteredBoxNames(filteredBoxNames);
    });

    function displayFilteredBoxNames(results) {
        branchLocationList.innerHTML = ""; // Clear previous results

        if (results.length > 0) {
            results.forEach(function (boxName) {
                var listItem = document.createElement("li");
                listItem.textContent = boxName;
                listItem.addEventListener("click", function () {
                    branchLocationInput.value = boxName;
                    branchLocationDropdown.classList.add("hidden");
                });
                branchLocationList.appendChild(listItem);
            });

            branchLocationDropdown.classList.remove("hidden");
        } else {
            branchLocationDropdown.classList.add("hidden");
        }
    }

    // Close the dropdown when clicking outside of it
    document.addEventListener("click", function (event) {
        if (!branchLocationDropdown.contains(event.target) && event.target !== branchLocationInput) {
            branchLocationDropdown.classList.add("hidden");
        }
    });

    // Prevent the dropdown from closing when clicking inside it
    branchLocationDropdown.addEventListener("click", function (event) {
        event.stopPropagation();
    });





//----------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ----------------------------------------------------------------------------











$(document).ready(function() {
        $("#branch").change(function() {
            var branchLocation = $(this).val();

            // Send an AJAX request to updateBoxName route
            $.ajax({
                type: "POST",
                url: "/location",
                data: { branchLocation: branchLocation },
                dataType: "json",
                success: function(response) {
                    // Handle the response from the server
                    $("#Loc").html(response.locationName);
                    // console.log(response.locationName);
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        });
    });
</script>

</body>
</html>
