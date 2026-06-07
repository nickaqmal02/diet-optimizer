<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\LPSolverService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // If admin, send to admin dashboard
        if ($user->is_admin) {
            return redirect('/admin/dashboard');
        }
        
        return view('student.dashboard', compact('user'));
    }
    
    public function optimize(Request $request, LPSolverService $solver)
    {
        $user = auth()->user();
        $budget = $request->input('budget', $user->budget_rm);
        
        $result = $solver->optimize($user, $budget); // we send this argument to the optimize function in LP services
        
        if ($result['foods'] && count($result['foods']) > 0) {
            // Save to history if you have the model
            if (class_exists(\App\Models\MealRecommendation::class)) {
                try{
                    $user->mealRecommendations()->create([
                        'budget_used' => $budget,
                        'total_calories' => $result['total_calories'],
                        'total_protein' => $result['total_protein'],
                        'total_price' => $result['total_price'],
                        'food_combination' => json_encode($result['foods'])
                    ]);
                } catch (\Exception $e) {
                // fail if table doesnt exists
                }
            }
        }
        
        return view('student.result', compact('result', 'budget', 'user'));
    }
    
    public function history()
    {
        $user = auth()->user();
        $meals = collect(); // Empty collection for now
        
        // If model exists, get meals
        if (class_exists(\App\Models\MealRecommendation::class)) {
            $meals = $user->mealRecommendations()->latest()->paginate(10);
        }
        
        return view('student.history', compact('meals', 'user'));
    }
    
    public function profile()
    {
        $user = auth()->user();
        return view('student.profile', compact('user'));
    }
    
    public function updateProfile(Request $request)
    {
    $user = auth()->user();
    
    // Base validation
    $rules = [
        'name' => 'required|string|min:5',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'weight_kg' => 'required|numeric|min:30|max:200',
        'height_cm' => 'required|numeric|min:100|max:250',
        'activity_level' => 'required|in:sedentary,light,moderate,active,very_active',
        'goal' => 'required|in:lose,maintain,gain',
        'budget_rm' => 'required|numeric|min:1|max:100',
    ];
    
    // Add password validation if password field is filled
    if ($request->filled('password')) {
        $rules['current_password'] = 'required|current_password';
        $rules['password'] = 'required|min:8|confirmed';
    }
    
    $validated = $request->validate($rules);
    
    // Update basic info (including email)
    $user->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'weight_kg' => $validated['weight_kg'],
        'height_cm' => $validated['height_cm'],
        'activity_level' => $validated['activity_level'],
        'goal' => $validated['goal'],
        'budget_rm' => $validated['budget_rm'],
    ]);
    
    // Update password if provided
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
        $user->save();
    }
    
    // Recalculate BMR/TDEE
    $user->bmr_calories = $user->calculateBMR();
    $user->tdee_calories = $user->calculateTDEE($user->bmr_calories);
    $user->target_calories_per_day = $user->calculateTargetCalories($user->tdee_calories);
    $user->save();
    
    $message = 'Profile updated successfully!';
    if ($request->filled('password')) {
        $message .= ' Password has been changed.';
    }
    if ($user->wasChanged('email')) {
        $message .= ' Email has been updated.';
    }
    
    return redirect()->route('student.dashboard')->with('success', $message);
    }
}