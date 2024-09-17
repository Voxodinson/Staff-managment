<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
class UserController extends Controller
{
    public function index(){
        $employees = User::all();
       
        return view('employees',  compact('employees'));
    }
    public function show($id){
        $employee = User::findOrFail($id);
        return view('employee-detail', ['employee'=> $employee]);
     }
     public function update($id){
        $employee = User::findOrFail($id);
        return view('edit-staff-by-admin', ['employee'=> $employee]);
     }
    public function destroy($id){
        $employee = User::findOrFail($id);
        $employee->delete();
    
        return redirect()->route('employees')->with('msg', "Employee $employee->id deleted sucessfully");
    }
}
