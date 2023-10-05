<html lang="en">

@extends('layouts.app')

@section('title' , 'New Rack')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}"> --}}
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
                        <a href="{{ route('partialRemove') }}">
                            <button class="btn btn-danger"><span class="material-symbols-outlined">delete</span></button>
                        </a>
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
                '<!-- Add other form fields here -->' +
                '</form>',
            focusConfirm: false,
            showCancelButton: true,
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
