@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] overflow-auto no-scrollbar flex items-center justify-start flex-col p-2  py-4">
        <div class="text-white bg-green-300 w-[50%] flex items-center justify-start px-2">
            <span>{{ session('success') }}</span>
        </div>
        <div
            class="w-[50%] h-fit mt-2 flex items-center justify-center relative border-[1px] border-gray-200 rounded-lg shadow-sm">

            <div class="w-full flex items-center justify-center flex-col  gap-2  p-3 ">
                <div class="w-fit h-fit  relative ">
                    <div
                        class="w-[140px] h-[140px]  shadow-sm    flex items-center rounded-full  justify-center overflow-hidden  ">
                        @if ($employee->profile_picture)
                            <img src="{{ asset('storage/profile_pictures/' . $employee->profile_picture) }}"
                                alt="Profile Picture" class="w-full">
                        @else
                            <img src="storage/profile_pictures/guest-profile.jpg" alt=""
                                class="w-full  rounded-full object-cover scale-110">
                        @endif

                    </div>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <h2 class="capitalize font-bold">{{ $employee->firstname }}
                        {{ $employee->lastname }}
                    </h2>
                    <span class="text-[.7rem]">{{ $employee->email }}</span>
                </div>

                <div class="">
                    <p class="font-bold uppercase">{{ $employee->department }}</p>
                </div>
                <div class="flex gap-2">
                    <p @if ($employee->bio != '')  @endif>{{ $employee->bio }}</p>
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
                            <p>{{ $employee->id }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Firstname :</p>
                            <p>{{ $employee->firstname }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Lastname :</p>
                            <p>{{ $employee->lastname }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Position :</p>
                            <p>{{ $employee->department }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Salary :</p>
                            <p>{{ $employee->salary }}$</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Phone :</p>
                            <p class="capitalize">{{ $employee->phone }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Gender :</p>
                            <p class="capitalize">{{ $employee->gender }}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Birthday :</p>
                            <p>{{ $employee->birthday }}</p>
                        </div>

                        <div class="flex gap-2">
                            <p class="font-bold">Address :</p>
                            <p>{{ $employee->address }}</p>
                        </div>


                        <div class="flex gap-2">
                            <p class="font-bold">Bio :</p>
                            <p @if ($employee->bio != '')  @endif>{{ $employee->bio }}</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="dropdown absolute top-2 right-2">
                <a id="navbarDropdown" class="p-2 flex items-center justify-center rounded-full bg-gray-100" href="#"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="#5f6368">
                        <path
                            d="M480-189.23q-24.75 0-42.37-17.63Q420-224.48 420-249.23q0-24.75 17.63-42.38 17.62-17.62 42.37-17.62 24.75 0 42.37 17.62Q540-273.98 540-249.23q0 24.75-17.63 42.37-17.62 17.63-42.37 17.63ZM480-420q-24.75 0-42.37-17.63Q420-455.25 420-480q0-24.75 17.63-42.37Q455.25-540 480-540q24.75 0 42.37 17.63Q540-504.75 540-480q0 24.75-17.63 42.37Q504.75-420 480-420Zm0-230.77q-24.75 0-42.37-17.62Q420-686.02 420-710.77q0-24.75 17.63-42.37 17.62-17.63 42.37-17.63 24.75 0 42.37 17.63Q540-735.52 540-710.77q0 24.75-17.63 42.38-17.62 17.62-42.37 17.62Z" />
                    </svg>
                </a>

                <div class="dropdown-menu dropdown-menu-end w-full " aria-labelledby="navbarDropdown">
                    <div class="hover:bg-gray-200 bg-gray-100 p-2">
                        <form action="/employees/{{ $employee->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-[.8rem] text-red-500">Delete account</button>
                        </form>
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
