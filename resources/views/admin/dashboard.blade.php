<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Top Navigation Bar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <span class="text-2xl">🍽️</span>
                    <span class="font-semibold text-gray-800">Diet Optimizer</span>
                    <span class="ml-2 text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded-full">Admin</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-red-600 transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar + Main Layout -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 min-h-screen">
            <div class="p-4">
                <div class="mb-6">
                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        <div class="text-2xl font-bold text-gray-800">{{ auth()->user()->name[0] ?? 'A' }}</div>
                        <div class="text-sm text-gray-500 mt-1">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 bg-gray-100 rounded-lg text-gray-900 font-medium">
                        <span>📊</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.foods.index') }}" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <span>🍗</span>
                        <span>Food Management</span>
                    </a>
                    <a href="{{ route('admin.students.index') }}" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <span>👥</span>
                        <span>Students</span>
                    </a>
                    <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <span>🏠</span>
                        <span>Student View</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Welcome Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-500 mt-1">Manage your diet optimization platform</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Total Students</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $totalStudents }}</p>
                        </div>
                        <div class="bg-blue-50 rounded-full p-3">
                            <span class="text-2xl">👨‍🎓</span>
                        </div>
                    </div>
                    <div class="mt-3 text-xs text-gray-500">Registered users</div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Food Items</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $totalFoods }}</p>
                        </div>
                        <div class="bg-green-50 rounded-full p-3">
                            <span class="text-2xl">🍲</span>
                        </div>
                    </div>
                    <div class="mt-3 text-xs text-gray-500">{{ $proteinFoods }} protein, {{ $carbsFoods }} carbs, {{ $vegFoods }} veg</div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Avg. Protein/Meal</p>
                            <p class="text-3xl font-bold text-gray-800">{{ round($avgProtein) }}g</p>
                        </div>
                        <div class="bg-purple-50 rounded-full p-3">
                            <span class="text-2xl">💪</span>
                        </div>
                    </div>
                    <div class="mt-3 text-xs text-green-600">From student optimizations</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.foods.create') }}" class="flex items-center justify-between p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                        <div>
                            <span class="font-medium text-gray-800">Add New Food</span>
                            <p class="text-sm text-gray-500 mt-1">Add items to database</p>
                        </div>
                        <span class="text-2xl text-blue-600">+</span>
                    </a>
                    <a href="{{ route('admin.foods.index') }}" class="flex items-center justify-between p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                        <div>
                            <span class="font-medium text-gray-800">Manage Foods</span>
                            <p class="text-sm text-gray-500 mt-1">Edit or delete items</p>
                        </div>
                        <span class="text-2xl text-green-600">✏️</span>
                    </a>
                    <a href="{{ route('admin.students.index') }}" class="flex items-center justify-between p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                        <div>
                            <span class="font-medium text-gray-800">View Students</span>
                            <p class="text-sm text-gray-500 mt-1">Monitor user activity</p>
                        </div>
                        <span class="text-2xl text-purple-600">👥</span>
                    </a>
                </div>
            </div>

            <!-- Two Column Layout for Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Students -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Recent Students</h2>
                        <a href="{{ route('admin.students.index') }}" class="text-sm text-blue-600 hover:underline">View all →</a>
                    </div>
                    <div class="space-y-3">
                        @forelse($recentStudents as $student)
                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition">
                            <div>
                                <p class="font-medium text-gray-800">{{ $student->name }}</p>
                                <p class="text-sm text-gray-500">{{ $student->email }}</p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-400">{{ $student->created_at->diffForHumans() }}</span>
                                <div>
                                    <span class="text-xs px-2 py-0.5 rounded-full 
                                        {{ $student->goal == 'lose' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                        {{ $student->goal == 'maintain' ? 'bg-blue-100 text-blue-700' : '' }}
                                        {{ $student->goal == 'gain' ? 'bg-green-100 text-green-700' : '' }}">
                                        {{ ucfirst($student->goal) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">No students registered yet</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Foods -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Recently Added Foods</h2>
                        <a href="{{ route('admin.foods.index') }}" class="text-sm text-blue-600 hover:underline">View all →</a>
                    </div>
                    <div class="space-y-3">
                        @forelse($recentFoods as $food)
                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition">
                            <div>
                                <p class="font-medium text-gray-800">{{ $food->name }}</p>
                                <p class="text-sm text-gray-500">{{ $food->category }} • {{ $food->protein }}g protein • {{ $food->calories }} cal</p>
                            </div>
                            <div class="text-right">
                                <span class="text-green-600 font-medium">RM {{ number_format($food->price, 2) }}</span>
                                <div>
                                    <span class="text-xs text-gray-400">{{ $food->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">No foods added yet</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- BMR Info Box -->
            <div class="mt-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                <div class="flex items-start gap-4">
                    <div class="text-3xl">📊</div>
                    <div>
                        <h3 class="font-semibold text-gray-800">System Summary</h3>
                        <p class="text-sm text-gray-600 mt-1">
                            Total of <strong>{{ $totalStudents }}</strong> students using the platform, 
                            with <strong>{{ $totalFoods }}</strong> food items available for optimization.
                        </p>
                        <p class="text-sm text-gray-600 mt-2">
                            Average protein per meal recommendation: <strong>{{ round($avgProtein) }}g</strong>
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>