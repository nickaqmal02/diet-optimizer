<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Add New Food</h1>
                <a href="{{ route('admin.foods.index') }}" class="text-blue-600 hover:underline">← Back</a>
            </div>
            
            <form method="POST" action="{{ route('admin.foods.store') }}">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Food Name</label>
                    <input type="text" name="name" required class="w-full border rounded px-3 py-2">
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Category</label>
                        <input type="text" name="category" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Serving Size</label>
                        <input type="text" name="serving_size" required class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Price (RM)</label>
                        <input type="number" step="0.01" name="price" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Calories</label>
                        <input type="number" name="calories" required class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Protein (g)</label>
                        <input type="number" name="protein" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Carbs (g)</label>
                        <input type="number" name="carbs" required class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Fats (g)</label>
                        <input type="number" name="fats" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Fiber (g)</label>
                        <input type="number" name="fiber" value="0" class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Add Food
                </button>
            </form>
        </div>
    </div>
</body>
</html>