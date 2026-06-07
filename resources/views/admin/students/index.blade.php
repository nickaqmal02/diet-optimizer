<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">
    
    <!-- Top Navigation -->
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

    <!-- Sidebar + Main -->
    <div class="flex">
        <aside class="w-64 bg-white border-r border-gray-200 min-h-screen">
            <div class="p-4">
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <span>📊</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.foods.index') }}" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <span>🍗</span>
                        <span>Food Management</span>
                    </a>
                    <a href="{{ route('admin.students.index') }}" class="flex items-center gap-3 px-3 py-2 bg-gray-100 rounded-lg text-gray-900 font-medium">
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

        <main class="flex-1 p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Manage Students</h1>
                <p class="text-gray-500 mt-1">View and manage registered students</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-4 rounded">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Weight</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Height</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Goal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joined</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($students as $student)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $student->email }}</td>
                            <td class="px-6 py-4">{{ $student->weight_kg }} kg</td>
                            <td class="px-6 py-4">{{ $student->height_cm }} cm</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    {{ $student->goal == 'lose' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $student->goal == 'maintain' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $student->goal == 'gain' ? 'bg-green-100 text-green-700' : '' }}">
                                    {{ ucfirst($student->goal) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $student->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.students.show', $student) }}" class="text-blue-600 hover:underline mr-3">View</a>
                                <form method="POST" action="{{ route('admin.students.destroy', $student) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this student?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </main>
    </div>
</body>
</html>