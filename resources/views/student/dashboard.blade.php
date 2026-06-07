@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">🍽️ Diet Optimizer Dashboard</h1>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                </div>
                
                <p class="text-gray-600 mb-6">Welcome back, <strong>{{ auth()->user()->name }}</strong>!</p>
                
                <!-- Stats Cards -->
<div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
    <div class="bg-blue-100 rounded-lg p-4 text-center">
        <div class="text-2xl font-bold text-blue-800">{{ auth()->user()->getCaloriesPerMeal() ?? 'N/A' }}</div>
        <div class="text-sm text-gray-700">Calories/meal</div>
    </div>
    <div class="bg-green-100 rounded-lg p-4 text-center">
        <div class="text-2xl font-bold text-green-800">RM {{ auth()->user()->budget_rm ?? '0' }}</div>
        <div class="text-sm text-gray-700">Budget</div>
    </div>
    <div class="bg-purple-100 rounded-lg p-4 text-center">
        <div class="text-2xl font-bold text-purple-800">{{ ucfirst(auth()->user()->goal ?? 'N/A') }}</div>
        <div class="text-sm text-gray-700">Goal</div>
    </div>
    <div class="bg-orange-100 rounded-lg p-4 text-center">
        <div class="text-2xl font-bold text-orange-800">{{ auth()->user()->weight_kg ?? 'N/A' }} kg</div>
        <div class="text-sm text-gray-700">Weight</div>
    </div>
    <div class="bg-indigo-100 rounded-lg p-4 text-center">
        <div class="text-2xl font-bold text-indigo-800">{{ auth()->user()->height_cm ?? 'N/A' }} cm</div>
        <div class="text-sm text-gray-700">Height</div>
    </div>
</div>
                
                <!-- Optimizer Form -->
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <h2 class="text-xl font-semibold mb-4">Find Your Optimal Meal</h2>
                    <form method="POST" action="{{ route('student.optimize') }}">
                        @csrf
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-medium mb-1">Budget (RM)</label>
                                <input type="number" step="0.50" name="budget" value="{{ auth()->user()->budget_rm }}" 
                                       class="w-full border rounded px-3 py-2">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                    Optimize 🚀
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Quick Links -->
                <div class="flex gap-4 mb-6">
                    <a href="{{ route('student.profile') }}" class="text-blue-600 hover:underline">Update Profile</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('student.history') }}" class="text-blue-600 hover:underline">Meal History</a>
                </div>
                
                <!-- BMR Info -->
                <div class="bg-yellow-50 rounded-lg p-4">
                    <h3 class="font-semibold mb-2">Your Personal Stats</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div>BMR: {{ number_format(auth()->user()->bmr_calories ?? 0) }} cal/day</div>
                        <div>TDEE: {{ number_format(auth()->user()->tdee_calories ?? 0) }} cal/day</div>
                        <div>Target: {{ number_format(auth()->user()->target_calories_per_day ?? 0) }} cal/day</div>
                        <div>Per meal: {{ auth()->user()->getCaloriesPerMeal() ?? 0 }} cal</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection