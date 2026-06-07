<!DOCTYPE html>
<html>
<head>
    <title>Your Optimal Meal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-2">✨ Your Optimal Meal</h1>
            
            @if($result['foods'])
                <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-6">
                    <p class="text-green-700">✅ Optimal solution found!</p>
                </div>
                
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Your Stats</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <p>BMR: {{ number_format($student->bmr_calories) }} cal/day</p>
                        <p>TDEE: {{ number_format($student->tdee_calories) }} cal/day</p>
                        <p>Target: {{ number_format($student->target_calories_per_day) }} cal/day</p>
                        <p>Per meal: {{ $student->getCaloriesPerMeal() }} cal</p>
                    </div>
                </div>
                
                <h2 class="text-xl font-semibold mb-3">Recommended Meal (RM {{ number_format($budget, 2) }})</h2>
                <div class="space-y-2 mb-6">
                    @foreach($result['foods'] as $food)
                    <div class="border rounded p-3 flex justify-between">
                        <div>
                            <span class="font-medium">{{ $food->name }}</span>
                            <span class="text-gray-500 text-sm ml-2">({{ $food->serving_size }})</span>
                        </div>
                        <div class="text-right">
                            <div>RM {{ number_format($food->price, 2) }}</div>
                            <div class="text-xs text-gray-500">{{ $food->protein }}g protein</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <h3 class="font-semibold mb-2">Total Nutrition</h3>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-blue-600">{{ $result['total_protein'] }}g</div>
                            <div class="text-xs text-gray-600">Protein</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-orange-600">{{ $result['total_calories'] }}</div>
                            <div class="text-xs text-gray-600">Calories</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-600">RM {{ number_format($result['total_price'], 2) }}</div>
                            <div class="text-xs text-gray-600">Total Cost</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-yellow-50 rounded-lg p-4">
                    <p class="text-sm">
                        <strong>💡 Tip:</strong> {{ $student->getGoalAdvice() ?? 'Stay consistent with your nutrition goals!' }}
                    </p>
                </div>
            @else
                <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-6">
                    <p class="text-red-700">❌ No optimal combination found. Try increasing your budget or calorie target.</p>
                </div>
            @endif
            
            <div class="mt-6 flex gap-4">
                <a href="{{ route('optimizer.index') }}" class="flex-1 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700">
                    Try Again
                </a>
            </div>
        </div>
    </div>
</body>
</html>