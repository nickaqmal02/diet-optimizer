<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linear Programming Proof - Diet Optimizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Linear Programming Proof</h1>
            <p class="text-gray-600 mt-2">Diet Optimization System - Mathematical Model</p>
            <div class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm mt-2">
                Maximize Protein • Subject to Budget & Calorie Constraints
            </div>
        </div>

        <!-- Step 1: Summarize into Table -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Step 1: Summarize into Table</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">Variable</th>
                            <th class="border p-3 text-left">Food Item</th>
                            <th class="border p-3 text-center">Protein (g)</th>
                            <th class="border p-3 text-center">Price (RM)</th>
                            <th class="border p-3 text-center">Calories</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $index => $food)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-3 font-mono">x{{ $index + 1 }}</td>
                            <td class="border p-3">{{ $food->name }}</td>
                            <td class="border p-3 text-center">{{ $food->protein }}g</td>
                            <td class="border p-3 text-center">RM {{ number_format($food->price, 2) }}</td>
                            <td class="border p-3 text-center">{{ $food->calories }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Step 2: Identify Constraints and Objective -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Step 2: Identify Constraints and Objective</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-blue-50 rounded-lg p-4">
                    <h3 class="font-semibold text-blue-800 mb-2">🎯 Objective Function (MAXIMIZE)</h3>
                    <div class="bg-white rounded p-3 font-mono text-sm overflow-x-auto">
                        <p class="font-bold">S = 25x₁ + 20x₂ + 7x₃ + 12x₄ + 10x₅ + 4x₆ + 3x₇</p>
                        <p class="text-gray-500 text-xs mt-1">Where S = Total Protein intake (grams)</p>
                    </div>
                </div>
                
                <div class="bg-red-50 rounded-lg p-4">
                    <h3 class="font-semibold text-red-800 mb-2">⚠️ Constraints</h3>
                    <div class="space-y-2 text-sm font-mono">
                        <p>1. Budget: 4.5x₁ + 4.0x₂ + 1.8x₃ + 1.5x₄ + 2.0x₅ + 1.5x₆ + 2.5x₇ ≤ 10</p>
                        <p>2. Calories: 220x₁ + 290x₂ + 90x₃ + 150x₄ + 120x₅ + 200x₆ + 80x₇ ≤ 664</p>
                        <p>3. Min Protein: 25x₁ + 20x₂ + 7x₃ + 12x₄ + 10x₅ + 4x₆ + 3x₇ ≥ 15</p>
                        <p>4. Non-negativity: x₁, x₂, x₃, x₄, x₅, x₆, x₇ ≥ 0</p>
                        <p>5. Integer: x₁...x₇ ∈ {0, 1, 2, 3}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3 & 4: Solutions for Different Budgets -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Step 3 & 4: Identify Optimal Values for Different Budgets</h2>
            
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-center">Budget (RM)</th>
                            <th class="border p-3 text-center">Optimal Combination</th>
                            <th class="border p-3 text-center">Total Protein (S)</th>
                            <th class="border p-3 text-center">Total Price</th>
                            <th class="border p-3 text-center">Total Calories</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $budget => $result)
                        <tr class="hover:bg-gray-50 {{ $budget == 10 ? 'bg-green-50' : '' }}">
                            <td class="border p-3 text-center font-bold">RM {{ $budget }}</td>
                            <td class="border p-3">
                                @if($result['foods'])
                                    @foreach($result['foods'] as $food)
                                        <span class="inline-block bg-gray-100 rounded px-2 py-1 text-xs m-0.5">{{ $food->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-gray-400">No solution found</span>
                                @endif
                            </td>
                            <td class="border p-3 text-center font-bold text-green-600">{{ $result['total_protein'] }}g</td>
                            <td class="border p-3 text-center">RM {{ number_format($result['total_price'], 2) }}</td>
                            <td class="border p-3 text-center">{{ $result['total_calories'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Step 5: Conclusion -->
        <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl shadow-md p-6 border border-green-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Step 5: Conclusion</h2>
            
            @php $bestResult = $results[10]; @endphp
            
            @if($bestResult['foods'])
            <div class="prose max-w-none">
                <p class="text-gray-700 mb-3">
                    Based on the Linear Programming optimization for a <strong>student with RM10 budget</strong> and 
                    <strong>calorie deficit goal (664 cal/meal)</strong>:
                </p>
                
                <div class="bg-white rounded-lg p-4 mb-3">
                    <h3 class="font-bold text-gray-800 mb-2">📊 Optimal Solution:</h3>
                    <ul class="list-disc list-inside space-y-1 text-gray-700">
                        @foreach($bestResult['foods'] as $food)
                        <li><strong>{{ $food->name }}</strong> - {{ $food->protein }}g protein, RM {{ number_format($food->price, 2) }}, {{ $food->calories }} cal</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="grid grid-cols-3 gap-4 mb-3">
                    <div class="text-center bg-green-100 rounded p-3">
                        <div class="text-2xl font-bold text-green-700">{{ $bestResult['total_protein'] }}g</div>
                        <div class="text-xs text-gray-600">Total Protein</div>
                    </div>
                    <div class="text-center bg-blue-100 rounded p-3">
                        <div class="text-2xl font-bold text-blue-700">{{ $bestResult['total_calories'] }}</div>
                        <div class="text-xs text-gray-600">Total Calories</div>
                    </div>
                    <div class="text-center bg-orange-100 rounded p-3">
                        <div class="text-2xl font-bold text-orange-700">RM {{ number_format($bestResult['total_price'], 2) }}</div>
                        <div class="text-xs text-gray-600">Total Cost</div>
                    </div>
                </div>
                
                <p class="text-gray-700 font-semibold mt-3">
                    ✅ <strong>Conclusion:</strong> The student should consume the above combination to achieve 
                    <strong>{{ $bestResult['total_protein'] }}g of protein</strong> while staying within 
                    <strong>RM10 budget</strong> and <strong>664 calorie limit</strong> for their weight loss goal.
                </p>
                
                <p class="text-gray-500 text-sm mt-3 italic">
                    This proves that the Linear Programming model successfully maximizes protein intake 
                    subject to budget and calorie constraints - exactly matching the mathematical approach 
                    taught in class.
                </p>
            </div>
            @endif
        </div>

        <!-- Comparison with Traditional LP Example -->
        <div class="bg-white rounded-xl shadow-md p-6 mt-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Comparison: Traditional LP vs Diet Optimization LP</h2>
            
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3 text-left">Aspect</th>
                        <th class="border p-3 text-left">Traditional Example (Books & Calculators)</th>
                        <th class="border p-3 text-left">Your Diet System</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="border p-3 font-semibold">Decision Variables</td>
                        <td class="border p-3">B (Books), C (Calculators)</td>
                        <td class="border p-3">x₁...x₇ (Food items)</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border p-3 font-semibold">Objective</td>
                        <td class="border p-3">Maximize Sales = 20B + 18C</td>
                        <td class="border p-3">Maximize Protein = Σ(protein × quantity)</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border p-3 font-semibold">Constraints</td>
                        <td class="border p-3">Cost ≤ 27000, Time ≤ 43200</td>
                        <td class="border p-3">Budget ≤ RM10, Calories ≤ 664</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border p-3 font-semibold">Optimal Solution</td>
                        <td class="border p-3">B = 4222, C = 1473 → Sales = 110954</td>
                        <td class="border p-3">Food combination → Protein = {{ $bestResult['total_protein'] ?? 'N/A' }}g</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>