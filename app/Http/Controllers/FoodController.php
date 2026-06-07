<?php


namespace App\Http\Controllers; // noted that namespace shall always be first


use App\Models\Food; // then if we wanna import Food model just import it
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // first kito keno oyk gapo object hk nk ata
    public function index(Request $request)
    {
        if ($request->has('category')){
            $foods = Food::where('category', $request->category)->get();
        } else {
            $foods = Food::all();
        }
        
        $categories = Food::distinct()->pluck('category');

        return view('foods.index', compact('foods', 'categories')); 
    }

    // function for show
    public function show($id) // because we pass the $id if we can see it our resources/routes/web.php
    {
        $food = Food::findOrFail($id);
        return view('foods.show', compact('food'));
    }

    // add methods to create and store to handle each request get or post request
    public function create()
    {
        return view('foods.create');

    }
    //ni kito send request POST
    public function store(Request $request)
    {
        // before we store it we need to validate it 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'calories' => 'required|integer|min:0',
            'protein' => 'nullable|numeric|min:0',
            'carbs' => 'nullable|numeric|min:0',
            'fats' => 'nullable|numeric|min:0',
            'fiber' => 'nullable|numeric|min:0',
            'serving_size' => 'required|string',
        ]);

        // check wether it is available or not
        $validated['is_available'] = 1;

        // create using that validated data which is often cleaner 
        $food = Food::create($validated);

        return redirect()->route('foods.show', $food->id)
                         ->with('success', 'Food added successfully!');
    }
}
