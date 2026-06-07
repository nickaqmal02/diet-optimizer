<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Services\LPSolverService;

class LpProofController extends Controller
{
    public function index(LPSolverService $solver)
    {
        // Get a sample student (65kg, active, losing weight)
        $student = User::where('is_admin', false)->first();
        
        if (!$student) {
            // Create a demo student for proof
            $student = new User();
            $student->name = "Demo Student";
            $student->email = "demo@test.com";
            $student->age = 22;
            $student->gender = "male";
            $student->weight_kg = 65;
            $student->height_cm = 170;
            $student->activity_level = "moderate";
            $student->goal = "lose";
            $student->budget_rm = 10;
            $student->bmr_calories = 1607.5;
            $student->tdee_calories = 2491.63;
            $student->target_calories_per_day = 1991.63;
        }
        
        // Run optimization for different budgets
        $results = [];
        $budgets = [5, 8, 10, 12, 15];
        
        foreach ($budgets as $budget) {
            $results[$budget] = $solver->optimize($student, $budget);
        }
        
        // Get all foods for the table
        $foods = Food::all();
        
        return view('lp-proof', compact('student', 'results', 'foods'));
    }
}