<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentSection;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentSectionController extends Controller
{
    public function index(){
        $studentSection = StudentSection::latest()->get();
        return response()->json($studentSection);
    }

    public function store(Request $request){
        $request->validate([
            'section_name' => 'required|unique:student_sections,section_name|max:30',
        ]);

        StudentSection::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now()
        ]);

        return response('Section name has been Inserted.');
    }

    public function edit($id){
        $studentSection = StudentSection::findOrFail($id);
        return response()->json($studentSection);
    }

    public function update($id, Request $request){
        $request->validate([
            'section_name' => 'required|unique:student_sections,section_name|max:30',
        ]);

        StudentSection::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'updated_at' => Carbon::now()
        ]);

        return response('Section has been updated');
    }

    public function delete($id){
        StudentSection::findOrFail($id)->delete();
        return response('Section has been deleted');
    }
}
