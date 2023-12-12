<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    public function index(){
        $studentSubject = StudentSubject::latest()->get();
        return response()->json($studentSubject);
    }

    public function store(Request $request){
        $request->validate([
            'subject_name' => 'required|unique:student_subjects,subject_name|max:30',
            'subject_code' => 'required|unique:student_subjects,subject_code|max:30',
        ]);

        StudentSubject::insert([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);

        return response('Subject name has been Inserted.');
    }

    public function edit($id){
        $studentSubject = StudentSubject::findOrFail($id);
        return response()->json($studentSubject);
    }

    public function update($id, Request $request){
        $request->validate([
            'subject_name' => 'required|unique:student_subjects,subject_name|max:30',
            'subject_code' => 'required|unique:student_subjects,subject_code|max:30',
        ]);

        StudentSubject::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);

        return response('Subject has been updated');
    }

    public function delete($id){
        StudentSubject::findOrFail($id)->delete();
        return response('Subject has been deleted');
    }
}
