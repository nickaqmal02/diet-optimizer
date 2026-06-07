@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('student.dashboard') }}" class="text-blue-600 hover:underline mb-4 inline-block">← Back to Dashboard</a>
                
                <h1 class="text-2xl font-bold mb-4">✨ Your Optimal Meal</h1>
                
                @if($result['foods'] && count($result['foods']) > 0)
                    <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-6">
                        <p class="text-green-700">✅ Optimal solution found for RM {{ number_format($budget, 2) }}!</p>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="bg-blue-100 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-blue-800">{{ $result['total_protein'] ?? 0 }}g</div>
                            <div class="text-sm">Protein</div>
                        </div>
                        <div class="bg-orange-100 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-orange-800">{{ $result['total_calories'] ?? 0 }}</div>
                            <div class="text-sm">Calories</div>
                        </div>
                        <div class="bg-green-100 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-800">RM {{ number_format($result['total_price'] ?? 0, 2) }}</div>
                            <div class="text-sm">Total Cost</div>
                        </div>
                    </div>
                    
                    <h2 class="text-xl font-semibold mb-3">Recommended Foods:</h2>
                    <div class="space-y-3 mb-6">
                        @foreach($result['foods'] as $food)
                        <div class="border rounded-lg p-4 flex justify-between items-center">
                            <div>
                                <span class="font-medium">{{ $food->name }}</span>
                                <span class="text-gray-500 text-sm ml-2">({{ $food->serving_size }})</span>
                            </div>
                            <div class="text-right">
                                <div class="text-green-600 font-bold">RM {{ number_format($food->price, 2) }}</div>
                                <div class="text-xs text-gray-500">{{ $food->protein }}g protein | {{ $food->calories }} cal</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-6">
                        <p class="text-red-700">❌ No optimal combination found for RM {{ number_format($budget, 2) }}.</p>
                        <p class="text-red-600 text-sm mt-2">Try increasing your budget.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection