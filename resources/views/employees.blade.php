@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] flex flex-col items-start justify-start p-2">

        <div class="w-full flex flex-col justify-start items-start gap-2">

            <div class="w-full flex justify-between items-center p-2 bg-white rounded-lg shadow-sm">
                <h4 class=" font-semibold ml-2">Employees</h4>
                <div class="flex w-full justify-end items-center gap-2">
                    <div class="">
                        <a href="/register"
                            class="py-2 px-4 rounded-lg outline-none w-full border-[1px] bg-blue-400 hover:bg-blue-200  text-gray-50 hover:text-gray-900  border-gray-200 capitalize">Add
                            employee</a>

                    </div>
                    <div class="w-[30%] relative">
                        <input type="text" placeholder="Search employees..."
                            class="p-2 rounded-lg outline-none w-full border-[1px] border-gray-200">
                        <span class="absolute top-0 right-0"> <svg xmlns="http://www.w3.org/2000/svg" height="40"
                                viewBox="0 -960 960 960" width="40">
                                <path
                                    d="M787.641-137.335 530.872-394.104q-29.899 25.866-69.407 40.061-39.508 14.196-81.773 14.196-102.098 0-172.817-70.681-70.72-70.681-70.72-171.845 0-101.165 70.681-171.908 70.68-70.744 171.992-70.744 101.311 0 172.036 70.699t70.725 171.897q0 42.301-14.385 81.839-14.385 39.539-40.538 70.692l257.179 256.103-36.204 36.46ZM379.282-390.102q80.406 0 136.229-55.962 55.823-55.961 55.823-136.372 0-80.41-55.823-136.372-55.823-55.962-136.229-55.962-80.748 0-136.81 55.962T186.41-582.436q0 80.411 56.062 136.372 56.062 55.962 136.81 55.962Z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="w-full p-3 rounded-lg bg-white">
                <table class="w-full h-fit  rounded-lg">
                    <thead class="">
                        <tr class=" *:py-2 *:px-4  w-full *:capitalize rounded-lg">
                            <th>Id</th>
                            <th>Image</th>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>salary</th>
                            <th>gender</th>
                            <th>Create time</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody class="rounded-lg ">
                        @foreach ($employees as $employee)
                            <tr class=" odd:bg-gray-200  *:py-2 *:px-4 rounded-lg">
                                <td class="py-2 ">{{ $employee->id }}</td>
                                <td>

                                    <div
                                        class="w-[50px] h-[50px]  shadow-sm    flex items-center rounded-full  justify-center overflow-hidden  ">
                                        <a href="/employee/{{ $employee->id }}" class="">
                                            @if ($employee->profile_picture)
                                                <img src="{{ asset('storage/profile_pictures/' . $employee->profile_picture) }}"
                                                    class="w-full scale-110" alt="">
                                            @else
                                                <img src="{{ asset('storage/profile_pictures/guest-profile.jpg') }}"
                                                    alt="" class="w-full  rounded-full object-cover scale-110">
                                            @endif
                                        </a>
                                    </div>


                                </td>
                                <td class="uppercase">{{ $employee->department }}</td>
                                <td>
                                    {{ $employee->firstname }}
                                    {{ $employee->lastname }}
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->gender }}</td>
                                <td>{{ $employee->created_at }}</td>
                                <td>
                                    <a href="{{ route('employees.UpdateSalaryAndDepartment', $employee->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#EF5350">
                                            <path
                                                d="M200-200h43.92l427.93-427.92-43.93-43.93L200-243.92V-200Zm-40 40v-100.77l527.23-527.77q6.15-5.48 13.57-8.47 7.43-2.99 15.49-2.99t15.62 2.54q7.55 2.54 13.94 9.15l42.69 42.93q6.61 6.38 9.04 14 2.42 7.63 2.42 15.25 0 8.13-2.74 15.56-2.74 7.42-8.72 13.57L260.77-160H160Zm600.77-556.31-44.46-44.46 44.46 44.46ZM649.5-649.5l-21.58-22.35 43.93 43.93-22.35-21.58Z" />
                                        </svg>
                                </td>
                                </a>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
