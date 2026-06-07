<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Food;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts
        $totalStudents = User::where('is_admin', false)->count();
        $totalFoods = Food::count();
        $totalAdmins = User::where('is_admin', true)->count();
        
        // Get protein foods count
        $proteinFoods = Food::where('category', 'Protein')->count();
        $carbsFoods = Food::where('category', 'Carbs')->count();
        $vegFoods = Food::where('category', 'Vegetables')->count();
        
        // Get recent records
        $recentStudents = User::where('is_admin', false)->latest()->take(5)->get();
        $recentFoods = Food::latest()->take(5)->get();
        
        // Get average protein per meal from meal recommendations
        $avgProtein = \App\Models\MealRecommendation::avg('total_protein') ?? 0;
        
        // Pass data to view
        return view('admin.dashboard', compact(
            'totalStudents',
            'totalFoods',
            'totalAdmins',
            'proteinFoods',
            'carbsFoods',
            'vegFoods',
            'recentStudents',
            'recentFoods',
            'avgProtein'
        ));
    }
}