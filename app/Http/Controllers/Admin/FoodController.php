<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //here is all logic happens
    public function index()
    {
        $foods = Food::paginate(10);
        return view('admin.foods.index', compact('foods'));
    }

    public function create()
    {
        return view('admin.foods.create');

    }

    public function store(Request $request)
    {
        //like always we have to validate it first
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'calories' => 'required|integer|min:0',
            'protein' => 'required|integer|min:0',
            'carbs' => 'required|integer|min:0',
            'fats' => 'required|integer|min:0',
            'fiber' => 'nullable|integer|min:0',
            'serving_size' => 'required|string',
        ]);

        Food::create($validated);

        return redirect()->route('admin.foods.index')->with('success', 'Food added succesfully');
    }

    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    public function update(Request $request, Food $food)
    {
        //like always we have to validate it first
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'calories' => 'required|integer|min:0',
            'protein' => 'required|integer|min:0',
            'carbs' => 'required|integer|min:0',
            'fats' => 'required|integer|min:0',
            'fiber' => 'nullable|integer|min:0',
            'serving_size' => 'required|string',
        ]);

        Food::create($validated);

        return redirect()->route('admin.foods.index')->with('success', 'Food Update succesfully');
    }

    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('admin.foods.index')->with('success', 'Food deleted successfully!');
    }
}
