@extends('layouts.app')

@section('content')
    <div class="w-full mt-5 flex items-center justify-center">
        <div class=" w-[30%] flex justify-center items-center  flex-col border-[1px] border-gray-400 p-4 rounded-lg">
            <div class=" font-bold uppercase text-[1.2rem]">{{ __('Login') }}</div>
            <form method="POST" action="{{ route('login') }} " class="flex flex-col w-full">
                @csrf


                <div class="w-full">
                    <label for="email" class="">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror



                    <label for="password" class="mt-4">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="w-full flex justify-between ">
                        <div class="flex items-center  justify-center gap-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="text-[.8rem] mt-2" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-[.8rem] underline mt-2" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="mt-4 py-4 border-b-[1px] border-gray-200">
                        <button type="submit"
                            class="py-1 text-white px-4 rounded-full bg-gradient-to-r from-blue-400 to-sky-400  w-full">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="text-[.8rem] w-full flex items-center justify-center gap-2">Dont have an account yet? <a
                            class="underline" href="/register"> Register now</a></div>
            </form>
        </div>
    </div>
@endsection
