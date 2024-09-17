@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] overflow-auto no-scrollbar py-4
     flex items-start  justify-center">
        <div class="w-[40%] flex flex-col justify-center items-center shadow-sm p-4 border-[1px] border-gray-200 rounded-lg">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col w-full">
                @csrf
                @method('PUT')
                <div class="w-full flex flex-col items-center justify-center ">

                    <div class="relative">
                        <div class="w-[120px] h-[120px] flex items-center rounded-full  justify-center overflow-hidden">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                                    alt="Profile Picture" class="w-full   ">
                            @else
                                <img src="storage/profile_pictures/guest-profile.jpg" alt=""
                                    class="w-full  rounded-full object-cover scale-110">
                            @endif
                        </div>
                        <div
                            class="w-[40px] h-[40px] rounded-full flex items-center justify-center bg-gray-200 absolute right-1 bottom-1 hover:bg-gray-100">
                            <label for="profile_picture" class="custom-file-input" id="uploadButton">
                                <input type="file" name="profile_picture" id="profile_picture" class="hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                    width="30px" fill="#5f6368">
                                    <path
                                        d="M366.15-412.31h347.7L603.54-558.46l-98.16 123.08-63.53-75.39-75.7 98.46ZM324.62-280q-27.62 0-46.12-18.5Q260-317 260-344.62v-430.76q0-27.62 18.5-46.12Q297-840 324.62-840h430.76q27.62 0 46.12 18.5Q820-803 820-775.38v430.76q0 27.62-18.5 46.12Q783-280 755.38-280H324.62Zm0-40h430.76q9.24 0 16.93-7.69 7.69-7.69 7.69-16.93v-430.76q0-9.24-7.69-16.93-7.69-7.69-16.93-7.69H324.62q-9.24 0-16.93 7.69-7.69 7.69-7.69 16.93v430.76q0 9.24 7.69 16.93 7.69 7.69 16.93 7.69Zm-120 160q-27.62 0-46.12-18.5Q140-197 140-224.61v-470.77h40v470.77q0 9.23 7.69 16.92 7.69 7.69 16.93 7.69h470.76v40H204.62ZM300-800v480-480Z" />
                                </svg>

                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2 ">
                    <div class="w-full flex flex-col">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" value="{{ Auth::user()->firstname }}"
                            class="p-2 border-[1px] border-gray-200 rounded-md lg outline-none">

                    </div>
                    <div class="w-full flex flex-col ">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" value="{{ Auth::user()->lastname }}" required
                            class="p-2 border-[1px] border-gray-200 rounded-md lg outline-none">
                    </div>
                    <div class="w-full flex flex-col">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" value="{{ Auth::user()->birthday }}" required
                            class="p-2 border-[1px] border-gray-200 rounded-md lg outline-none">
                    </div>
                    <div class="w-full flex flex-col ">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" required
                            class="p-2 border-[1px] border-gray-200 rounded-md lg outline-none">
                    </div>
                    <div class="w-full flex flex-col ">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ Auth::user()->address }}" required
                            class="p-2 border-[1px] border-gray-200 rounded-md lg outline-none">

                    </div>
                    <div class="w-full flex flex-col ">
                        <label for="gender">Gender</label>
                        <select name="gender" required class="p-2 border-[1px] border-gray-200 rounded-md lg outline-none">
                            <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>
                                Male</option>
                            <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="w-full flex flex-col">
                        <label for="bio">Bio</label>
                        <textarea name="bio" placeholder="bio" class="p-2 border-[1px] border-gray-200 rounded-md lg outline-none">{{ Auth::user()->bio }}</textarea>

                    </div>
                </div>
                <div class="w-full flex justify-end items-end mt-4">
                    <button type="submit"
                        class="py-2 px-10 bg-red-400 hover:bg-red-400 rounded-lg text-white">Save</button>
                </div>
            </form>
        </div>


    </div>
@endsection
