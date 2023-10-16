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


    {{-- <div class="  mb-[2%] mt-1 ml-[140%]">
        <a href="{{url('/trash-details',)}}/{{$packetDetails[0]->pkgID}}">
            <button class="delete-button">
                <svg class="delete-svgIcon" viewBox="0 0 448 512">
                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                </svg>
            </button>
        </a>
    </div> --}}

    <div>
        <h1 class="text-center ml-[50%]">PACKETS</h1>
    </div>

    <div class="ml-[25%] w-full">
        <table class="table ">
            <thead>
                <tr>
                    <th>Job Number</th>
                    <th>Packet ID</th>
                    <th>Material Type</th>
                    <th>Material Description</th>
                    <th>Number Of Bundles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packetDetails as $packet)
                <tr>
                    <td>{{$packet->jobNumber }}</td>
                    <td>{{$packet->packetID }}</td>
                    <td>{{$packet->materialType }}</td>
                    <td>{{$packet->materialDescription }}</td>
                    <td>{{$packet->numberOfBundles }}</td>
                    <td>
                        {{-- <a href="{{route('edit-packet', ['packetID' => $packet->packetID])}}"> --}}
                            <button class="btn btn-primary edit-button" data-packetID="{{ $packet->packetID }} " onclick="editPacket()"><span class="material-symbols-outlined">edit</span></button>
                        {{-- </a> --}}
                    </td>
                    <td>
                        <form method="GET" action="{{route('partial-Remove', ['packetID' => $packet->packetID])}}">
                            @csrf
                            <input type="hidden" name="pkgId" value="{{request()->segment(2) }}">

                            <input type="hidden" name="locID" value="{{request()->input('locID') }}">


                            <button class="btn btn-danger" type="submit"><span class="material-symbols-outlined">delete</span></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
      </div>


</div>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

// Add this script to your Blade view or an external JavaScript file
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const packetID = this.getAttribute('data-packetID');

            // Fetch packet details using AJAX
            fetch(`/get-packet-details/${packetID}`)
                .then(response => response.json())
                .then(data => {
                    editPacket(data);
                })
                .catch(error => {
                    console.error('Error fetching packet details:', error);
                });
        });
    });

    function editPacket(packetDetails) {
        Swal.fire({
            title: 'Update Packet',
            html:
                '<form id="my-form" method="POST" action="{{ route('update-packet') }}" class="w-full"> ' +
                '@csrf' +
                '<input type="hidden" name="packetID" value="' + packetDetails.packetID + '">' + // Add this line
                '<input id="swal-input2-jobNumber" type="text" class="swal2-input" placeholder="Job Number" name="jobNumber" value="' + packetDetails.jobNumber + '" style="width: 80%;">' +
                '<input id="swal-input2-dateIn" type="text" class="swal2-input" placeholder="Date In" name="dateIn" value="' + packetDetails.dateIn + '" style="width: 80%;">' +
                '<input id="swal-input2-materialType" type="text" class="swal2-input" placeholder="Material Type" name="materialType" value="' + packetDetails.materialType + '" style="width: 80%;">' +
                '<input id="swal-input2-materialDescription" type="text" class="swal2-input" placeholder="Material Description" name="materialDescription" value="' + packetDetails.materialDescription + '" style="width: 80%;">' +
                '<input id="swal-input2-numberOfBundles" type="number" class="swal2-input" placeholder="Number Of Bundles" name="numberOfBundles" value="' + packetDetails.numberOfBundles + '" style="width: 80%;">' +
                '<input id="swal-input2-addNumberOfBundles" type="number" class="swal2-input" placeholder="Add Number Of Bundles " name="addBundles" value="" style="width: 80%;">' +
                '<!-- Add other form fields here -->' +
                '</form>',
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonColor: "#198754",
            confirmButtonText: 'Submit',
            preConfirm: () => {
                // You can perform client-side form validation here if needed
            },
        }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('my-form');
                    const formData = new FormData(form);

                    // Send an AJAX request to update the packet
                    fetch('{{ route('update-packet') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Success', 'Packet updated successfully', 'success');
                        } else {
                            Swal.fire('Error', 'Failed to update packet!', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error updating packet:', error);
                        Swal.fire('Error', 'An error occurred while updating packet', 'error');
                    });
                }
            });
        }
    });


    </script>


</body>
</html>
