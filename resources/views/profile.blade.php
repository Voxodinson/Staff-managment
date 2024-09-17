@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] overflow-auto no-scrollbar flex items-center justify-start flex-col p-2  py-4">
        <div class="text-white bg-green-300 w-[50%] flex items-center justify-start px-2">
            <span>{{ session('success') }}</span>
        </div>
        <div class="w-[50%] h-fit mt-2 flex items-center justify-center border-[1px] border-gray-200 rounded-lg shadow-sm">

            <div class="w-full flex items-center justify-center flex-col  gap-2  p-3 ">
                <div class="w-fit h-fit  relative ">
                    <div
                        class="w-[140px] h-[140px]  shadow-sm    flex items-center rounded-full  justify-center overflow-hidden  ">
                        @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                                alt="Profile Picture" class="w-full">
                        @else
                            <img src="{{ asset('storage/profile_pictures/guest-profile.jpg') }}" alt="Guest Profile"
                                class="w-full rounded-full object-cover scale-110">
                        @endif

                        <a href="/profile/edit-Profile"
                            class="absolute p-2 rounded-full flex items-center justify-center bg-white bottom-1 right-1 shadow-md hover:bg-blue-300 ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#5f6368">
                                <path
                                    d="M200-200h43.92l427.93-427.92-43.93-43.93L200-243.92V-200Zm-40 40v-100.77l527.23-527.77q6.15-5.48 13.57-8.47 7.43-2.99 15.49-2.99t15.62 2.54q7.55 2.54 13.94 9.15l42.69 42.93q6.61 6.38 9.04 14 2.42 7.63 2.42 15.25 0 8.13-2.74 15.56-2.74 7.42-8.72 13.57L260.77-160H160Zm600.77-556.31-44.46-44.46 44.46 44.46ZM649.5-649.5l-21.58-22.35 43.93 43.93-22.35-21.58Z" />
                            </svg></a>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <h2 class="capitalize font-bold">{{ Auth::user()->firstname }}
                        {{ Auth::user()->lastname }}
                    </h2>
                    <span class="text-[.7rem]">{{ Auth::user()->email }}</span>
                </div>

                <div class="">
                    <p class="font-bold uppercase">{{ Auth::user()->department }}</p>
                </div>
                <div class="flex gap-2">
                    <p @if (Auth::user()->bio != '')  @endif>{{ Auth::user()->bio }}</p>
                </div>
                <div class="w-full flex items-center justify-center">
                    <button onclick="toggle()"
                        class="py-2 border-[1px] border-gray-200 rounded-lg w-[50%] capitalize hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400 ">more
                        information</button>
                </div>
                <div class="w-full hidden" id="show">
                    <div
                        class=" w-full flex flex-col items-start justify-start p-3 shadow-sm rounded-lg border-[1px]
                        *:border-b-[1px] *:w-full *:py-1  border-gray-200 ">
                        <div class="flex gap-2">
                            <p class="font-bold">ID :</p>
                            <p>{{ Auth::user()->id }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Firstname :</p>
                            <p>{{ Auth::user()->firstname }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Lastname :</p>
                            <p>{{ Auth::user()->lastname }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Position :</p>
                            <p>{{ Auth::user()->department }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Salary :</p>
                            <p>{{ Auth::user()->salary }}$</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Phone :</p>
                            <p class="capitalize">{{ Auth::user()->phone }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Gender :</p>
                            <p class="capitalize">{{ Auth::user()->gender }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Birthday :</p>
                            <p>{{ Auth::user()->birthday }}</p>
                        </div>

                        <div class="flex gap-2">
                            <p class="font-bold">Address :</p>
                            <p>{{ Auth::user()->address }}</p>
                        </div>


                        <div class="flex gap-2">
                            <p class="font-bold">Bio :</p>
                            <p @if (Auth::user()->bio != '')  @endif>{{ Auth::user()->bio }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script>
            function toggle(event) {
                var show = document.getElementById('show');
                if (show.style.display === 'none' || show.style.display === '') {
                    show.style.display = 'block';
                } else {
                    show.style.display = 'none';
                }
            }
        </script>
    </div>
@endsection
