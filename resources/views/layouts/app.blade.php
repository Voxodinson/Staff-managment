<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vox-company') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</head>

<body class="flex w-full h-[100vh]">
    @guest
    @else
        <div class="w-[20%] h-[100vh] flex flex-col bg-white shadow-sm z-2 justify-between ">
            <div class="h-full w-full  ">
                <div class="h-[10vh] flex items-center justify-start px-4">
                    <a class="navbar-brand text-black fw-bold text-capitalize text-[1.2rem] " href="{{ url('/') }}">
                        {{ config('app.name', 'Vox-company') }}
                    </a>

                </div>
                <div class="w-full h-fit flex flex-col">

                    <ul
                        class="w-full h-fit p-2 flex flex-col gap-1 *:py-1 *:px-4  *:flex *:gap-2 *:items-end *:capitalize *:text-gray-700">
                        <h1 class="w-full py-2  text-black uppercase border-b-[1px] border-gray-300">Marketing</h1>
                        <li
                            class="hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400  group  rounded-lg  {{ Request::is('home') ? 'bg-blue-300 text-white' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#5f6368">
                                <path
                                    d="M240-200h147.69v-235.38h184.62V-200H720v-360L480-741.54 240-560v360Zm-40 40v-420l280-211.54L760-580v420H532.31v-235.38H427.69V-160H200Zm280-310.77Z" />
                            </svg>
                            <a href="{{ route('home') }}"
                                class="group-hover:translate-x-3
                                transition-all duration-200 ease-in-out h-full ">home</a>
                        </li>
                        <li
                            class="hover:bg-gradient-to-r 
                                hover:text-white from-blue-400 to-sky-400 group rounded-lg  {{ Request::is('dashboard') ? 'bg-blue-300 text-white' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#5f6368">
                                <path
                                    d="M540-600v-200h260v200H540ZM160-480v-320h260v320H160Zm380 320v-320h260v320H540Zm-380 0v-200h260v200H160Zm40-360h180v-240H200v240Zm380 320h180v-240H580v240Zm0-440h180v-120H580v120ZM200-200h180v-120H200v120Zm180-320Zm200-120Zm0 200ZM380-320Z" />
                            </svg>
                            <a href="{{ route('dashboard') }}"
                                class="group-hover:translate-x-3  w-full h-full transition-all duration-200 ease-in-out">Dashboard</a>
                        </li>
                        <li
                            class="hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400  group  rounded-lg  {{ Request::is('marketplace') ? 'bg-blue-300 text-white' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#5f6368">
                                <path
                                    d="M292.31-115.38q-25.31 0-42.66-17.35-17.34-17.35-17.34-42.65 0-25.31 17.34-42.66 17.35-17.34 42.66-17.34 25.31 0 42.65 17.34 17.35 17.35 17.35 42.66 0 25.3-17.35 42.65-17.34 17.35-42.65 17.35Zm375.38 0q-25.31 0-42.65-17.35-17.35-17.35-17.35-42.65 0-25.31 17.35-42.66 17.34-17.34 42.65-17.34t42.66 17.34q17.34 17.35 17.34 42.66 0 25.3-17.34 42.65-17.35 17.35-42.66 17.35ZM235.23-740 342-515.38h265.38q6.93 0 12.31-3.47 5.39-3.46 9.23-9.61l104.62-190q4.61-8.46.77-15-3.85-6.54-13.08-6.54h-486Zm-19.54-40h520.77q26.08 0 39.23 21.27 13.16 21.27 1.39 43.81l-114.31 208.3q-8.69 14.62-22.58 22.93-13.88 8.31-30.5 8.31H324l-48.62 89.23q-6.15 9.23-.38 20 5.77 10.77 17.31 10.77h435.38v40H292.31q-35 0-52.23-29.5-17.23-29.5-.85-59.27l60.15-107.23L152.31-820H80v-40h97.69l38 80ZM342-515.38h280-280Z" />
                            </svg><a href="{{ route('marketplace') }}"
                                class="group-hover:translate-x-3 transition-all duration-200 ease-in-out h-full ">Marketplace</a>
                        </li>
                        @if (Auth::user()->department === 'hr')
                            <li
                                class="hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400  group   rounded-lg  {{ Request::is('employees') ? 'bg-blue-300 text-white' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5f6368">
                                    <path
                                        d="M675.38-415.38q-32.76 0-56.38-23.62-23.62-23.62-23.62-56.38 0-32.77 23.62-56.39 23.62-23.61 56.38-23.61 32.77 0 56.39 23.61 23.61 23.62 23.61 56.39 0 32.76-23.61 56.38-23.62 23.62-56.39 23.62Zm-180 200v-36q0-18.62 9.3-33.76 9.29-15.14 26.4-21.78 33.79-14.23 69.93-21.35 36.14-7.11 74.37-7.11 36.68 0 72.88 7.11 36.2 7.12 71.43 21.35 17.1 6.64 26.4 21.78 9.29 15.14 9.29 33.76v36h-360ZM384.62-504.62q-49.5 0-84.75-35.25t-35.25-84.75q0-49.5 35.25-84.75t84.75-35.25q49.5 0 84.75 35.25t35.25 84.75q0 49.5-35.25 84.75t-84.75 35.25Zm0-120Zm-280 409.24v-65.85q0-25.95 14.3-47.71 14.31-21.75 38.93-32.14 53.07-26.92 110.23-40.61 57.16-13.69 116.54-13.69 24.23 0 48.46 2.53 24.23 2.54 48.46 6.7l-17.08 17.84q-8.54 8.93-17.08 17.85-15.69-3.08-31.38-4-15.69-.92-31.38-.92-54.16 0-106.97 11.69Q224.85-352 176.92-326q-13.07 7.31-22.69 18.23-9.61 10.92-9.61 26.54v25.85h240v40h-280Zm280-40Zm0-289.24q33 0 56.5-23.5t23.5-56.5q0-33-23.5-56.5t-56.5-23.5q-33 0-56.5 23.5t-23.5 56.5q0 33 23.5 56.5t56.5 23.5Z" />
                                </svg><a
                                    href="{{ route('employees') }}"class="group-hover:translate-x-3 h-full  transition-all duration-200 ease-in-out">Employees</a>
                            </li>
                        @endif
                        <li
                            class="hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400  group  rounded-lg  {{ Request::is('discount') ? 'bg-blue-300 text-white' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#5f6368">
                                <path
                                    d="M820.62-393.85 566.15-139.38q-9.8 9.69-22.05 14.53-12.25 4.85-24.37 4.85-12.11 0-24.23-4.85-12.12-4.84-21.81-14.53L139.15-473.15q-9.46-8.7-14.3-20.72-4.85-12.02-4.85-25.28v-255.47q0-26.97 18.88-46.17Q157.77-840 185.38-840h255.47q12.97 0 25.14 5.25t21.09 14.13l333.54 333.77q9.99 9.81 14.57 22.06 4.58 12.25 4.58 24.65 0 12.4-4.58 24.39-4.58 11.98-14.57 21.9Zm-283 226.16 254.46-254.46q7.69-7.7 7.69-18.08 0-10.39-7.69-18.08L450.62-799.23H185.38q-10.76 0-18.07 6.92-7.31 6.93-7.31 17.69v255.24q0 4.61 1.54 9.23 1.54 4.61 5.38 8.46l334.54 334q7.69 7.69 18.08 7.69 10.38 0 18.08-7.69Zm-275.63-490q16.86 0 28.59-11.67t11.73-28.33q0-16.99-11.67-28.88t-28.33-11.89q-16.99 0-28.88 11.8t-11.89 28.65q0 16.86 11.8 28.59t28.65 11.73Zm219.55 179.23Z" />
                            </svg><a href="{{ route('discount') }}"
                                class="group-hover:translate-x-3 h-full  transition-all duration-200 ease-in-out w-full">discount</a>
                        </li>

                    </ul>
                </div>
                <div class="w-full h-fit flex flex-col">

                    <ul
                        class="w-full h-fit p-2 flex flex-col gap-1 *:py-1 *:px-4  *:flex *:gap-2 *:items-end *:capitalize *:text-gray-700">
                        <h1 class="w-full py-2  text-black uppercase border-b-[1px] border-gray-300">Payments</h1>
                        <li
                            class="hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400  group  rounded-lg  {{ Request::is('taxes') ? 'bg-blue-300 text-white' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#5f6368">
                                <path
                                    d="M459.38-215.38h39.24v-46.93q43.07-3.61 82.53-30.92 39.47-27.31 39.47-84.77 0-42-25.54-71.62-25.54-29.61-97.54-55.61-66.16-23.08-84.54-39.62-18.38-16.53-18.38-47.15 0-30.62 23.88-51t63.5-20.38q30.46 0 50.77 13.96 20.31 13.96 32.92 35.42l34.77-13.69q-14.08-28.85-41.27-48.31-27.19-19.46-58.57-21.69v-46.93h-39.24v46.93q-52.3 8.69-79.15 39-26.85 30.31-26.85 66.69 0 43.15 27.12 69.08Q409.62-497 474-473.69q64.54 23.77 86.73 42.92 22.19 19.15 22.19 52.77 0 42.23-30.8 60.81-30.81 18.57-66.12 18.57-34.54 0-62.35-20.11-27.8-20.12-44.42-57.27L344-360.77q17.08 41.08 45.81 64.04 28.73 22.96 69.57 32.42v48.93ZM480-120q-74.54 0-140.23-28.42-65.69-28.43-114.31-77.04-48.61-48.62-77.04-114.31Q120-405.46 120-480q0-74.54 28.42-140.23 28.43-65.69 77.04-114.31 48.62-48.61 114.31-77.04Q405.46-840 480-840q74.54 0 140.23 28.42 65.69 28.43 114.31 77.04 48.61 48.62 77.04 114.31Q840-554.54 840-480q0 74.54-28.42 140.23-28.43 65.69-77.04 114.31-48.62 48.61-114.31 77.04Q554.54-120 480-120Zm0-40q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                            </svg>
                            <a
                                href="{{ route('taxes') }}"class="group-hover:translate-x-3 transition-all duration-200 ease-in-out w-full">Taxes</a>
                        </li>

                    </ul>
                </div>
                <div class="w-full h-fit flex flex-col">

                    <ul
                        class="w-full  h-fit p-2 flex flex-col gap-1 *:py-1 *:px-4  *:flex *:gap-2 *:items-end  *:capitalize *:text-gray-700">
                        <h1 class="w-full  text-black uppercase border-b-[1px] border-gray-300">system</h1>



                        <li onclick=" toggleOpenShoesDetail()" class=" flex-col group flex w-full p-0">

                            <div
                                class="flex justify-between items-center p-1 px-3 cursor-pointer hover:bg-gradient-to-r  
                                 rounded-lg w-full hover:text-white from-blue-400 to-sky-400 {{ Request::is('profile', 'account', 'privacy&condition') ? 'bg-blue-300 text-white' : '' }}">
                                <div class="flex gap-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#5f6368">
                                        <path
                                            d="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            m405.38-120-14.46-115.69q-19.15-5.77-41.42-18.16-22.27-12.38-37.88-26.53L204.92-235l-74.61-130
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            92.23-69.54q-1.77-10.84-2.92-22.34-1.16-11.5-1.16-22.35 0-10.08 1.16-21.19 1.15-11.12
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            2.92-25.04L130.31-595l74.61-128.46 105.93 44.61q17.92-14.92 38.77-26.92 20.84-12
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            40.53-18.54L405.38-840h149.24l14.46 116.46q23 8.08 40.65 18.54 17.65 10.46 36.35
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            26.15l109-44.61L829.69-595l-95.31 71.85q3.31 12.38 3.7 22.73.38 10.34.38 20.42 0 9.31-.77
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            19.65-.77 10.35-3.54 25.04L827.92-365l-74.61 130-107.23-46.15q-18.7 15.69-37.62 26.92-18.92
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            11.23-39.38 17.77L554.62-120H405.38ZM440-160h78.23L533-268.31q30.23-8 54.42-21.96 24.2-13.96
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            49.27-38.27L736.46-286l39.77-68-87.54-65.77q5-17.08 6.62-31.42 1.61-14.35 1.61-28.81
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            0-15.23-1.61-28.81-1.62-13.57-6.62-29.88L777.77-606 738-674l-102.08
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            42.77q-18.15-19.92-47.73-37.35-29.57-17.42-55.96-23.11L520-800h-79.77l-12.46 107.54q-30.23
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            6.46-55.58 20.81-25.34 14.34-50.42 39.42L222-674l-39.77 68L269-541.23q-5 13.46-7 29.23t-2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            32.77q0 15.23 2 30.23t6.23 29.23l-86 65.77L222-286l99-42q23.54 23.77 48.88 38.12 25.35 14.34
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            57.12 22.34L440-160Zm38.92-220q41.85 0 70.93-29.08 29.07-29.07
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            29.07-70.92t-29.07-70.92Q520.77-580 478.92-580q-42.07 0-71.04 29.08-28.96 29.07-28.96
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            70.92t28.96 70.92Q436.85-380 478.92-380ZM480-480Z" />
                                    </svg>
                                    <span class="capitalize">Setting</span>

                                </div>
                                <span id="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                        width="24" style="transform: rotate(0deg);">
                                        <path
                                            d="M480-371.923 267.692-584.231 296-612.539l184 184 184-184 28.308 28.308L480-371.923Z" />
                                    </svg>
                                </span>
                            </div>
                            <div id="menu" class="h-fit w-full  hidden">
                                <ul
                                    class="flex flex-col gap-1 *:px-4 ml-8 *:py-1 *:border-b-[1px] *:border-gray-200 border-t-[1px] border-gray-200">
                                    <li class=" w-full  {{ Request::is('account') ? 'text-blue-300' : '' }} ">
                                        <a href="{{ route('account') }}"
                                            class="hover:translate-x-2
                                            justify-between hover:text-black transition-all duration-200 ease-in-out flex ">Account
                                            <span class="-rotate-90 "><svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                    viewBox="0 -960 960 960" width="24"
                                                    style="transform: rotate(0deg);">
                                                    <path d=" M480-371.923 267.692-584.231 296-612.539l184 184 184-184
                                                                                        28.308 28.308L480-371.923Z" />
                                                </svg>
                                            </span>
                                        </a>

                                    </li>

                                    <li class=" w-full  {{ Request::is('profile') ? 'text-blue-300' : '' }}">
                                        <a href="{{ route('profile') }}"
                                            class="hover:translate-x-2 justify-between hover:text-black transition-all duration-200 ease-in-out flex">
                                            Profile
                                            <span class="-rotate-90">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                    viewBox="0 -960 960 960" width="24"
                                                    style="transform: rotate(0deg);">
                                                    <path
                                                        d="M480-371.923 267.692-584.231 296-612.539l184 184 184-184 28.308 28.308L480-371.923Z" />
                                                </svg>
                                            </span>
                                        </a>
                                    </li>
                                    <li class=" w-full  {{ Request::is('privacy&condition') ? 'text-blue-300' : '' }}">
                                        <a href="{{ route('privacy&condition') }}"
                                            class="hover:translate-x-2
                                            justify-between hover:text-black transition-all duration-200 ease-in-out flex ">Privacy
                                            & condition<span class="-rotate-90 "><svg xmlns="http://www.w3.org/2000/svg"
                                                    height="24" viewBox="0 -960 960 960" width="24"
                                                    style="transform: rotate(0deg);">
                                                    <path
                                                        d=" M480-371.923 267.692-584.231 296-612.539l184 184
                                                                                                                                                                                                                                                                                                                                                                                                                                                184-184 28.308 28.308L480-371.923Z" />
                                                </svg>
                                            </span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li
                            class="hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400  group  rounded-lg flex justify-between">
                            <div class=" flex gap-2  items-end ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5f6368">
                                    <path
                                        d="M504-425.77ZM524-80H420l8.49-6.21q8.49-6.21 18.47-13.91 9.98-7.69 18.47-13.9l8.49-6.21h55.39q86.38-1.39 159.88-45.15Q762.69-209.15 805-285q-86-8.04-163-43.74-77-35.69-138-97.03-60.23-61-96.62-138Q371-640.77 364-726q-77 43-120.5 118.5T200-444q0 12 1.15 25.62 1.16 13.61 3.47 24.84l-5.85 2.04q-5.85 2.04-13.42 4.58-7.58 2.54-13.43 4.96l-5.84 2.42q-2.77-15.61-4.43-31.84Q160-427.62 160-444q0-116.77 67.23-210.58 67.23-93.81 177.39-130.8-4.16 93.61 28.69 180.03 32.84 86.43 99.23 152.81 66.38 66.39 152.81 99.23 86.42 32.85 180.03 28.69-36.76 110.16-130.69 177.39Q640.77-80 524-80Zm-284-40h180q25 0 42.5-17.5T480-180q0-25-17-42.5T422-240h-52l-20-48q-14-33-44-52.5T240-360q-50 0-85 34.5T120-240q0 50 35 85t85 35Zm0 40q-66.85-1.54-113.42-47.73Q80-173.92 80-240.23q0-66.3 46.58-113.04Q173.15-400 240.08-400q48.38 0 87.98 26.25 39.59 26.25 58.79 70.67l10 23.08h24.61q40.85.46 69.69 29.68Q520-221.11 520-179.99q0 41.84-29.08 70.91Q461.85-80 420-80H240Z" />
                                </svg>
                                <a
                                    href=""class="group-hover:translate-x-3 transition-all duration-200 ease-in-out">darkmode</a>
                            </div>
                            <div class="form-check form-switch flex items-center">
                                <input class="form-check-input " type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault">
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
            <div class="w-full h-fit flex flex-col p-2  gap-2">

                <div
                    class="w-full py-2 px-3 hover:bg-gradient-to-r hover:text-white from-blue-400 to-sky-400  group  rounded-lg  flex items-center gap-2 capitalize">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#5f6368">
                        <path
                            d="M224.62-160q-27.62 0-46.12-18.5Q160-197 160-224.62v-510.76q0-27.62 18.5-46.12Q197-800 224.62-800h256.15v40H224.62q-9.24 0-16.93 7.69-7.69 7.69-7.69 16.93v510.76q0 9.24 7.69 16.93 7.69 7.69 16.93 7.69h256.15v40H224.62Zm433.84-178.46-28.08-28.77L723.15-460H367.69v-40h355.46l-92.77-92.77 28.08-28.77L800-480 658.46-338.46Z" />
                    </svg>
                    <a class="group-hover:translate-x-3 transition-all duration-200 ease-in-out"href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </div>
            </div>
        </div>
    @endguest
    <div id="app" class="w-full h-fit flex flex-col">
        <nav class="w-full h-[10vh] flex justify-center items-center bg-white shadow-sm z-1 ">
            <div class="w-[90%] flex justify-between  items-center">
                @guest
                    <a class="navbar-brand text-black fw-bold text-capitalize " href="{{ url('/') }}">
                        {{ config('app.name', 'Vox-company') }}
                    </a>
                @else
                    <div class="h-full  relative w-[50%] flex items-center ">
                        <input type="text" placeholder="Search here..."
                            class="w-full py-2 px-4 outline-none border-[1px] border-gray-300 rounded-lg">
                        <button class="absolute right-[5px]">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                width="30" fill='#757575'>
                                <path
                                    d="M787.641-137.335 530.872-394.104q-29.899 25.866-69.407 40.061-39.508 14.196-81.773 14.196-102.098 0-172.817-70.681-70.72-70.681-70.72-171.845 0-101.165 70.681-171.908 70.68-70.744 171.992-70.744 101.311 0 172.036 70.699t70.725 171.897q0 42.301-14.385 81.839-14.385 39.539-40.538 70.692l257.179 256.103-36.204 36.46ZM379.282-390.102q80.406 0 136.229-55.962 55.823-55.961 55.823-136.372 0-80.41-55.823-136.372-55.823-55.962-136.229-55.962-80.748 0-136.81 55.962T186.41-582.436q0 80.411 56.062 136.372 56.062 55.962 136.81 55.962Z" />
                            </svg>
                        </button>

                    </div>
                @endguest

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="flex gap-3">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="">
                                    <a class=" py-1 px-3 rounded-full border-[1px] border-gray-400"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="">
                                    <a class="  py-1 px-3 rounded-full bg-gradient-to-r from-blue-400 to-sky-400  text-white"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize  " href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="w-full h-[90vh]">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleOpenShoesDetail() {
            var menu = document.getElementById('menu');
            var icon = document.getElementById('icon');
            if (menu.style.display === 'none') {
                menu.style.display = 'block';
                icon.style.transform = 'rotate(180deg)';
            } else {
                menu.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</body>

</html>
