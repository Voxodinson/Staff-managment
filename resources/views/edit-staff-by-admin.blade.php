@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] flex items-center justify-start flex-col">
        <div class="w-full flex items-center justify-start p-2">
            <a href="/employees"
                class="py-2 flex px-4 items-center gap-2 group justify-start border-[1px] border-gray-200 rounded-lg hover:bg-blue-200 semibold capitalize">
                <span class="rotate-90 group-hover:-translate-x-2 transition-all duration-100 ease-in-out ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                        style="transform: rotate(0deg);">
                        <path d="M480-371.923 267.692-584.231 296-612.539l184 184 184-184 28.308 28.308L480-371.923Z" />
                    </svg>
                </span>back
            </a>

        </div>
        <div class="w-[30%] flex flex-col gap-2 items-center justify-center p-3  border-gray-200 shadow-sm rounded-lg">
            <h2>Edit employees by Admin</h2>
            <form action="{{ route('employees.UpdateSalaryAndDepartment', $employee->id) }}" method="POST"
                enctype="multipart/form-data" class="w-full">
                @csrf
                <!-- Add your form fields here -->

                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control @error('department') is-invalid @enderror"
                        required>
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
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" name="salary" id="salary" value="{{ $employee->salary }}"
                        class="form-control">
                </div>
                <div class="w-full flex justify-end py-2">
                    <button type="submit" class="px-5 bg-blue-400 py-2 rounded-lg text-white">Update</button>

                </div>
            </form>
        </div>
    </div>
@endsection
