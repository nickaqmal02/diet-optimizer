@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">📊 Meal History</h1>
                    <a href="{{ route('student.dashboard') }}" class="text-blue-600 hover:underline">← Back</a>
                </div>
                
                @if($meals->count() > 0)
                    <div class="space-y-4">
                        @foreach($meals as $meal)
                        <div class="border rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($meal->created_at)->format('d M Y, H:i') }}</div>
                                    <div class="grid grid-cols-3 gap-4 mt-2">
                                        <div>
                                            <span class="text-xs text-gray-500">Protein</span>
                                            <div class="font-semibold">{{ $meal->total_protein }}g</div>
                                        </div>
                                        <div>
                                            <span class="text-xs text-gray-500">Calories</span>
                                            <div class="font-semibold">{{ $meal->total_calories }}</div>
                                        </div>
                                        <div>
                                            <span class="text-xs text-gray-500">Cost</span>
                                            <div class="font-semibold">RM {{ number_format($meal->total_price, 2) }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-gray-500">Budget: RM {{ number_format($meal->budget_used, 2) }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-100 rounded-lg p-6 text-center">
                        <p class="text-gray-600">No meal optimizations yet.</p>
                        <a href="{{ route('student.dashboard') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                            Try your first optimization →
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection