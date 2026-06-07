<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Foods - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Manage Food Items</h1>
                <div class="flex gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
                    <a href="{{ route('admin.foods.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add Food</a>
                </div>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-4">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            @endif
            
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">Name</th>
                            <th class="border p-3 text-left">Category</th>
                            <th class="border p-3 text-left">Price</th>
                            <th class="border p-3 text-left">Protein</th>
                            <th class="border p-3 text-left">Calories</th>
                            <th class="border p-3 text-left">Serving</th>
                            <th class="border p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-3">{{ $food->name }}</td>
                            <td class="border p-3">{{ $food->category }}</td>
                            <td class="border p-3">RM {{ number_format($food->price, 2) }}</td>
                            <td class="border p-3">{{ $food->protein }}g</td>
                            <td class="border p-3">{{ $food->calories }}</td>
                            <td class="border p-3">{{ $food->serving_size }}</td>
                            <td class="border p-3">
                                <a href="{{ route('admin.foods.edit', $food) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                                <form method="POST" action="{{ route('admin.foods.destroy', $food) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this food?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $foods->links() }}
            </div>
        </div>
    </div>
</body>
</html>