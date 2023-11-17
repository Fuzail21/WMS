<html lang="en">

@extends('layouts.app')

@section('title' , 'Reports')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/addNewRack.css') }}">
<link rel="stylesheet" href="{{ asset('css/terminationform.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection


@section('content')

@include('layouts.sidebar')



<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7 " style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong> </h1>
</div>

<div class="main">{{--  THIS DIV INSIDE IN HEADER BEACUSE THIS div class="main">, THIS CLASS MOVE ALL DATA WHEN USER HOVER ON SIDEBAR --}}

    {{-------------------------------------- Header it is same in all pages except login or register  -----------------------------------}}







        <div class="container">
            <div class="grid grid-cols-2">
               <div class="pt-1">
                <img class="" src="{{ asset('img/20-20-Logo-Color.png') }}" alt="20-20-Logo" width="170px">
               </div>

               <div class="pt-3">
                  <h1 class="text-3xl font-bold">Employee Termination Form</h1>
               </div>
            </div>
            <br>

            <form action="{{ route('formsubmit') }}" method="post" id="" class="" class="pt-4">
            @csrf

               <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="mb-4">
                    <div class="group">
                        <input required="" type="text" class="input w-[300px] datepicker">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label>Effective Date:</label>
                      </div>
                  </div>
               </div>

               <fieldset class="my-4">
                  <legend class="text-lg font-bold">Employee Date</legend>
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                     <!-- ... (similar modifications for other input fields) -->


                     <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Last Name:</label>
                      </div>


                      <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">First Name:</label>
                      </div>


                    <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Prefered Name:</label>
                      </div>

                      <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Title:</label>
                      </div>


                    <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">New Mgr/Sup:</label>
                      </div>


                    <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Ext:</label>
                      </div>
                  </div>

                    <div class="pt-[3%]">
                        <h5 class="text-lg font-bold">Location</h5>
                        <div class='grid grid-cols-1 md:grid-cols-3'>

                            <div class="items-center">
                                <input type="radio" id="radio1" name="myRadioGroup" class="pt-4" value="Nevada Plumbing">
                                <label for="radio1" class="ml-2 text-black" style="position: relative;">Nevada Plumbing</label>
                            </div>

                            <div class="items-center">
                                <input type="radio" id="radio2" name="myRadioGroup" class="" value="Riverside Plumbing">
                                <label for="radio2" class="ml-2 text-black" style="position: relative;">Riverside Plumbing</label>
                            </div>

                            <div class="items-center">
                                <input type="radio" id="radio3" name="myRadioGroup" class="" value="Riverside HVAC">
                                <label for="radio3" class="ml-2 text-black" style="position: relative;">Riverside HVAC</label>
                            </div>

                            <div class="items-center">
                                <input type="radio" id="radio4" name="myRadioGroup" class="" value="Cypress">
                                <label for="radio4" class="ml-2 text-black" style="position: relative;">Cypress</label>
                            </div>

                            <div class="">
                                <input type="radio" id="radio5" name="myRadioGroup" class="" value="San Marcos">
                                <label for="radio5" class="ml-2 text-black" style="position: relative;">San Marcos</label>
                            </div>



                        </div>

                        <div class="pt-[5%]">

                            <div class="group">
                                <input required="" type="text" class="input w-full">
                                <span class="highlight"></span>
                                <span class="bar w-full"></span>
                                <label class="text-sm">Job Description:</label>
                            </div>

                        </div>
                    </div>


               </fieldset>

               <fieldset class="my-4">
                  <legend class="text-lg font-bold">Documents Forwarding</legend>
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                     <!-- ... (similar modifications for other input fields) -->


                     <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Email Forwarding:</label>
                      </div>


                      <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Y Drive:</label>
                      </div>


                    <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">J Drive:</label>
                      </div>

                      <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Voice Mail:</label>
                      </div>


                    <div class="group">
                        <input required="" type="text" class="input w-[300px]">
                        <span class="highlight"></span>
                        <span class="bar w-[300px]"></span>
                        <label class="text-sm">Personal Computer Documents:</label>
                      </div>



                  </div>
               </fieldset>

               <fieldset class="my-4">
                  <legend class="text-lg font-bold">Comments and Other Instructions</legend>
                    <div class="mb-4 pt-[3%]">

                        <div class="group">
                            <input required="" type="text" class="input w-full">
                            <span class="highlight"></span>
                            <span class="bar w-full"></span>
                            <label class="text-sm">Any other Instructions? Please summarize here:</label>
                        </div>
                    </div>
               </fieldset>

               <div class="flex justify-center">
                <button class="bg-[#091F62] text-white px-4 py-2 rounded-md" type="submit">
                     Submit
                  </button>
               </div>

            </form>
         </div>



         <a href="{{ route('sendMail') }}">Send Mail</a>




</div>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.querySelector('.datepicker');
        const label = document.querySelector('.group label');

        flatpickr(input, {
            dateFormat: 'Y-m-d',
            enableTime: false,
            onClose: function (selectedDates, dateStr, instance) {
                if (dateStr) {
                    label.classList.add('transform', 'translate-y-[-100%]', 'text-xs', 'text-gray-400');
                } else {
                    label.classList.remove('transform', 'translate-y-[-100%]', 'text-xs', 'text-gray-400');
                }
            },
        });

        input.addEventListener('focus', function () {
            if (input.value) {
                label.classList.add('transform', 'translate-y-[-100%]', 'text-xs', 'text-gray-400');
            }
        });

        input.addEventListener('blur', function () {
            if (!input.value) {
                label.classList.remove('transform', 'translate-y-[-100%]', 'text-xs', 'text-gray-400');
            }
        });
    });
</script>
