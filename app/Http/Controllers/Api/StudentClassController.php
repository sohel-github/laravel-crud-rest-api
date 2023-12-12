<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index(){
        $studentClass = StudentClass::latest()->get();
        return response()->json($studentClass);
    }

    public function store(Request $request){
        $request->validate([
            'class_name' => 'required|unique:student_classes|max:25'
        ]);

        StudentClass::insert([
            'class_name' => $request->class_name
        ]);

        return response('Student class inserted successfully!');
    }

    public function edit($id){
        $studentClass = StudentClass::findOrFail($id);
        return response()->json($studentClass);
    }

    public function update($id, Request $request){

        $request->validate([
            'class_name' => 'required|unique:student_classes|max:25'
        ]);

        StudentClass::findOrFail($id)->update([
            'class_name' => $request->class_name
        ]);

        return response('Class has been updated!');
    }

    public function delete($id){
        StudentClass::findOrFail($id)->delete();
        return response('Class has been deleted');
    }
}
