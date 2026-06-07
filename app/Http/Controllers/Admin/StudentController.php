<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    // lets put some logic here
    public function index()
    {
        $students = User::where('is_admin', false)->paginate(15);
        return view('admin.students.index', compact('students'));
    }

    public function show(User $student)
    {
        return view('admin.students.show', compact('student'));
    }

    public function destroy(User $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully');
    }
}
