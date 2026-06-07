<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Student Details</h1>
                <a href="{{ route('admin.students.index') }}" class="text-blue-600 hover:underline">← Back</a>
            </div>
            
            <div class="space-y-4">
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="font-medium text-gray-800">{{ $student->name }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium text-gray-800">{{ $student->email }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Body Measurements</p>
                    <p class="font-medium text-gray-800">{{ $student->weight_kg }} kg / {{ $student->height_cm }} cm</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Activity Level</p>
                    <p class="font-medium text-gray-800">{{ ucfirst($student->activity_level) }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Goal</p>
                    <p class="font-medium text-gray-800">{{ ucfirst($student->goal) }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">BMR / TDEE</p>
                    <p class="font-medium text-gray-800">{{ number_format($student->bmr_calories) }} cal / {{ number_format($student->tdee_calories) }} cal</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Target Calories</p>
                    <p class="font-medium text-gray-800">{{ number_format($student->target_calories_per_day) }} cal/day ({{ $student->getCaloriesPerMeal() }} cal/meal)</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Default Budget</p>
                    <p class="font-medium text-gray-800">RM {{ number_format($student->budget_rm, 2) }}</p>
                </div>
                
                <div class="border-b pb-3">
                    <p class="text-sm text-gray-500">Member Since</p>
                    <p class="font-medium text-gray-800">{{ $student->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>