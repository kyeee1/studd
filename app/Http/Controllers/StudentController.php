<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

        public function index()
    {
        $students = Student::orderBy('id', 'asc')->get();

        return view('students.index', compact('students'));
    }


    public function create()
    {
        return view('students.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'subject' => 'required',
        ]);

        Student::create([
            'name' => $request->name,
            'course' => $request->course,
            'subject' => $request->subject,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    
    public function show(Student $student)
    {
        $studentNumber = Student::where('id', '<=', $student->id)->count();

        return view('students.show', compact('student', 'studentNumber'));
    }


   
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'subject' => 'required',
        ]);

        $student->update([
            'name' => $request->name,
            'course' => $request->course,
            'subject' => $request->subject,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
