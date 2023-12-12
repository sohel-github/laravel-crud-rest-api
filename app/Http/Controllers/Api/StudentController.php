<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $student = Student::latest()->get();
        return response()->json($student);
    }

    public function store(Request $request){
        $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|unique:students,name|max:30',
            'address' => 'required|max:30',
            'phone' => 'required|unique:students,phone|max:11',
            'email' => 'required|unique:students,email|max:50',
            'password' => 'required|max:50',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        Student::insert([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
            'created_at' => Carbon::now()
        ]);

        return response('Student has been Inserted.');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update($id, Request $request){
        $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|unique:students,name|max:30',
            'address' => 'required|max:30',
            'phone' => 'required|unique:students,phone|max:11',
            'email' => 'required|unique:students,email|max:50',
            'password' => 'required|max:50',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        Student::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
            'updated_at' => Carbon::now()
        ]);

        return response('Student has been updated');
    }

    public function delete($id){
        Student::findOrFail($id)->delete();
        return response('Student has been deleted');
    }
}
