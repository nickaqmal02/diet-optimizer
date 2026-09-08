<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Services\LPSolverService;
use Illuminate\Http\Request;

//hello 
class DietOptimizerController extends Controller
{
    //
    public function index()
    {
        return view('optimizer.index');
    }

    public function calculate(Request $request, LPSolverService $solver)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|integer|min:15|max:100',
            'gender' => 'required|in:male,female',
            'weight_kg' => 'required|numeric|min:30|max:200',
            'height_cm' => 'required|numeric|min:100|max:250',
            'activity_level' => 'required|in:sedentary,light,moderate,active,very_active',
            'goal' => 'required|in:lose,maintain,gain',
            'budget' => 'required|numeric|min:1|max:50'

        ]);

        // and then we go to creating student record
        $student = Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'weight_kg' => $validated['weight_kg'],
            'height_cm' => $validated['height_cm'],
            'activity_level' => $validated['activity_level'],
            'goal' => $validated['goal'],
            'budget_rm' => $validated['budget']
        ]);

        // get the optimal solution
        $result = $solver->optimize($student, $validated['budget']);

        return view('optimizer.result', [
            'student' => $student,
            'result' => $result,
            'budget' => $validated['budget']

        ]);
    }
}
