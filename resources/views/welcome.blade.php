@extends('layouts.layout')
@section('content')
    <div class="w-full h-[100vh] flex flex-col items-center justify-center gap-10 ">
        <div class="w-fit h-fit flex flex-col  items-center justify-center p-4">
            <div class=" flex items-center justify-center flex-col">
                <h1 class="text-[2rem] font-bold">Welcome to <span
                        class="bg-gradient-to-r from-blue-400 to-sky-300  text-transparent bg-clip-text">Vox-Company</span>
                    Staff Management Hub!
                </h1>
                <span class="font-medium">"Efficiently manage your staff and improve productivity."</span>
            </div>

        </div>
        <button
            class="py-2 w-[20%] font-medium bg-gradient-to-r from-blue-600 to-sky-400 rounded-lg  hover:from-sky-400 hover:to-sky-400 hover:scale-105 transition-all duration-100 ease-linear text-white "><a
                href="/login" class="capitalize">Login into your account</a></button>
    </div>
@endsection
