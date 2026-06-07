<!DOCTYPE html>
<html>
<head>
    <title>Diet Optimizer for Students</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-2">🍽️ Diet Optimizer</h1>
            <p class="text-gray-600 mb-6">Find the best meal within your budget using Linear Programming</p>
            
            <form method="POST" action="{{ route('optimizer.calculate') }}">
                @csrf
                
                <h2 class="text-xl font-semibold mb-3">Your Profile</h2>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">Name</label>
                        <input type="text" name="name" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Age</label>
                        <input type="number" name="age" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gender</label>
                        <select name="gender" required class="w-full border rounded px-3 py-2">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Weight (kg)</label>
                        <input type="number" step="0.1" name="weight_kg" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Height (cm)</label>
                        <input type="number" step="0.1" name="height_cm" required class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                
                <h2 class="text-xl font-semibold mb-3">Your Lifestyle</h2>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">Activity Level</label>
                        <select name="activity_level" required class="w-full border rounded px-3 py-2">
                            <option value="sedentary">Sedentary (Little exercise)</option>
                            <option value="light">Light (1-3 days/week)</option>
                            <option value="moderate">Moderate (3-5 days/week)</option>
                            <option value="active">Active (6-7 days/week)</option>
                            <option value="very_active">Very Active (Athlete)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Goal</label>
                        <select name="goal" required class="w-full border rounded px-3 py-2">
                            <option value="lose">Lose Weight (Deficit)</option>
                            <option value="maintain">Maintain Weight</option>
                            <option value="gain">Gain Muscle (Surplus)</option>
                        </select>
                    </div>
                </div>
                
                <h2 class="text-xl font-semibold mb-3">Your Budget</h2>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Budget for this meal (RM)</label>
                    <input type="number" step="0.50" name="budget" required class="w-full border rounded px-3 py-2">
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                    Find Optimal Meal 🚀
                </button>
            </form>
        </div>
    </div>
</body>
</html>