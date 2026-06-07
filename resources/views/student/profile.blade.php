@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Update Profile</h1>
                    <a href="{{ route('student.dashboard') }}" class="text-blue-600 hover:underline">← Back</a>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-4">
                        <p class="text-green-700">{{ session('success') }}</p>
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-4">
                        <ul class="text-red-700">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('student.profile.update') }}">
                    @csrf
                    
                    <h2 class="text-lg font-semibold mb-3">Account Information</h2>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Name</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" 
                                   class="w-full border rounded px-3 py-2 bg-gray-100">
                            <p class="text-xs text-gray-500 mt-1">Change your name</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" 
                                   class="w-full border rounded px-3 py-2">
                            <p class="text-xs text-gray-500 mt-1">Changing email will require re-verification</p>
                        </div>
                    </div>
                    
                    <h2 class="text-lg font-semibold mb-3">Body Measurements</h2>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Weight (kg)</label>
                            <input type="number" step="0.1" name="weight_kg" value="{{ auth()->user()->weight_kg }}" 
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Height (cm)</label>
                            <input type="number" step="0.1" name="height_cm" value="{{ auth()->user()->height_cm }}" 
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>
                    
                    <h2 class="text-lg font-semibold mb-3">Lifestyle Settings</h2>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Activity Level</label>
                            <select name="activity_level" class="w-full border rounded px-3 py-2" required>
                                <option value="sedentary" {{ auth()->user()->activity_level == 'sedentary' ? 'selected' : '' }}>Sedentary (Little exercise)</option>
                                <option value="light" {{ auth()->user()->activity_level == 'light' ? 'selected' : '' }}>Light (1-3 days/week)</option>
                                <option value="moderate" {{ auth()->user()->activity_level == 'moderate' ? 'selected' : '' }}>Moderate (3-5 days/week)</option>
                                <option value="active" {{ auth()->user()->activity_level == 'active' ? 'selected' : '' }}>Active (6-7 days/week)</option>
                                <option value="very_active" {{ auth()->user()->activity_level == 'very_active' ? 'selected' : '' }}>Very Active (Athlete)</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Goal</label>
                            <select name="goal" class="w-full border rounded px-3 py-2" required>
                                <option value="lose" {{ auth()->user()->goal == 'lose' ? 'selected' : '' }}>Lose Weight (Calorie Deficit)</option>
                                <option value="maintain" {{ auth()->user()->goal == 'maintain' ? 'selected' : '' }}>Maintain Weight</option>
                                <option value="gain" {{ auth()->user()->goal == 'gain' ? 'selected' : '' }}>Gain Muscle (Calorie Surplus)</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Default Budget (RM)</label>
                        <input type="number" step="0.50" name="budget_rm" value="{{ auth()->user()->budget_rm }}" 
                               class="w-full border rounded px-3 py-2" required>
                    </div>
                    
                    <h2 class="text-lg font-semibold mb-3 border-t pt-4">Change Password (Optional)</h2>
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Current Password</label>
                            <input type="password" name="current_password" 
                                   class="w-full border rounded px-3 py-2">
                            <p class="text-xs text-gray-500 mt-1">Required only if changing password</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">New Password</label>
                            <input type="password" name="password" 
                                   class="w-full border rounded px-3 py-2">
                            <p class="text-xs text-gray-500 mt-1">Minimum 8 characters</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Confirm New Password</label>
                            <input type="password" name="password_confirmation" 
                                   class="w-full border rounded px-3 py-2">
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection