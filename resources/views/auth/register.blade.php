@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] overflow-y-auto no-scrollbar flex items-start justify-center py-4">
        <div class="w-[40%] h-fit flex items-center justify-center flex-col p-4 rounded-lg border-[1px] border-gray-400 ">
            <div class="card-header font-bold text-[1.2rem] uppercase">{{ __('Register') }}</div>

            <div class="w-full">
                <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-2">
                    @csrf

                    <div class=" gap-2 w-full grid grid-cols-1 lg:grid-cols-2 mt-2">
                        <div>
                            <label for="firstname">{{ __('Firstname') }}</label>
                            <div>
                                <input id="firstname" type="text"
                                    class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                    value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="lastname">{{ __('Lastname') }}</label>
                            <div>
                                <input id="lastname" type="text"
                                    class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                    value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <label for="">Gender</label>
                        <div class=" grid w-full grid-cols-2 gap-2">
                            <div class="flex items-center gap-1 justify-start">
                                <input id="male" value="male" type="radio" name="gender" required>
                                <label for="male" class="text-[.8rem] ">Male</label>
                            </div>
                            <div class="flex items-center gap-1 justify-start">
                                <input id="female" value="female" type="radio" name="gender" required>
                                <label for="female" class="text-[.8rem] ">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class=" w-full ">
                        <label for="birthday">Birthday</label>
                        <input type="date" id="birthday" name="birthday" class="form-control">
                    </div>
                    <div>
                        <label for="phone">{{ __('Phone') }}</label>
                        <div>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-fill grid grid-cols-2 gap-2">
                        <div>
                            <label for="department">{{ __('Department') }}</label>
                            <div>
                                <select name="department" id="department"
                                    class="form-control @error('department') is-invalid @enderror" required>
                                    <option value="hr">HR</option>
                                    <option value="marketing">marketing</option>
                                    <option value="ux/ui design">UX/UI design</option>
                                    <option value="fullstack developer">fullstack developer</option>
                                    <option value="frontend developer">frontend developer</option>
                                    <option value="backend developer">backend developer</option>
                                    <option value="mobile developer">mobile developer</option>
                                    <option value="network">network</option>
                                    <!-- Add other department options here -->
                                </select>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="salary">{{ __('Salary') }}</label>
                            <div>
                                <input id="salary" type="text" class="form-control " name="salary" required>

                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="address">{{ __('Address') }}</label>
                        <div>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email">{{ __('Email Address') }}</label>
                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>
                        <div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <div>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="flex gap-2 items-center justify-start">
                        <input id="isAdmin" value="1" type="checkbox" name="isAdmin">
                        <label for="isAdmin" class="text-[.8rem] ">Create as an admin account?</label>
                    </div>

                    <div class="w-full mt-4">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-400 to-sky-400 py-1 rounded-lg text-white">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div
                        class="text-[.8rem] w-full flex items-center justify-center gap-2 border-t-[1px] border-gray-200 mt-2">
                        Already have an account? <a class="underline" href="/login"> Login now</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
