{{-- resources/views/foods/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List - Nutrition App</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .food-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .food-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: bold;
        }
        .nutrition-badge {
            background: #f8f9fa;
            padding: 5px 10px;
            border-radius: 8px;
            margin: 3px;
            display: inline-block;
            font-size: 12px;
        }
        .btn-details {
            border-radius: 25px;
            padding: 8px 20px;
        }
        .stats {
            font-size: 14px;
        }
        .food-icon {
            font-size: 40px;
            color: #667eea;
        }
        .filter-btn {
            border-radius: 25px;
            padding: 8px 20px;
            margin: 5px;
            transition: all 0.3s ease;
        }
        .filter-btn:hover {
            transform: translateY(-2px);
        }
        .filter-btn.active {
            background: white;
            color: #667eea;
            font-weight: bold;
        }
        .category-badge {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .category-badge:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="text-white mb-3">
                <i class="fas fa-utensils me-3"></i>
                Food Nutrition Guide
            </h1>
            <p class="text-white-50">Discover healthy food options and their nutritional values</p>
        </div>

        <!-- Inside the header section, add this button -->
<div class="text-center mb-4">
    <a href="{{ route('foods.create') }}" class="btn btn-light btn-lg">
        <i class="fas fa-plus-circle me-2"></i>Add New Food
    </a>
</div>

        <!-- Category Filter Buttons -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">
                                <i class="fas fa-filter me-2 text-primary"></i>
                                Filter by Category
                            </h5>
                            <i class="fas fa-utensils text-muted"></i>
                        </div>
                        
                        <div class="d-flex flex-wrap justify-content-center gap-2">
                            <a href="/foods" class="btn btn-primary filter-btn {{ !request()->has('category') ? 'active' : '' }}">
                                <i class="fas fa-list me-2"></i>All Foods
                            </a>
                            
                            @foreach($categories as $cat)
                                <a href="/foods?category={{ urlencode($cat) }}" 
                                   class="btn btn-outline-primary filter-btn {{ request('category') == $cat ? 'active bg-primary text-white' : '' }}">
                                    <i class="fas fa-{{ $cat == 'Protein' ? 'drumstick-bite' : ($cat == 'Carbs' ? 'bread-slice' : ($cat == 'Vegetables' ? 'leaf' : 'apple-alt')) }} me-2"></i>
                                    {{ $cat }}
                                </a>
                            @endforeach
                        </div>
                        
                        <!-- Active Filter Indicator -->
                        @if(request()->has('category'))
                            <div class="text-center mt-3">
                                <span class="badge bg-info text-dark">
                                    <i class="fas fa-eye me-1"></i>
                                    Showing: {{ request('category') }} | 
                                    <a href="/foods" class="text-dark">
                                        <i class="fas fa-times-circle ms-1"></i> Clear filter
                                    </a>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Food Grid -->
        <div class="row">
            @forelse($foods as $food)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card food-card h-100 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-{{ $food->category == 'Protein' ? 'drumstick-bite' : ($food->category == 'Carbs' ? 'bread-slice' : 'apple-alt') }} me-2"></i>
                                    {{ $food->name }}
                                </h5>
                                <span class="badge bg-light text-dark">
                                    <i class="fas fa-tag me-1"></i>{{ $food->category }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <!-- Price -->
                            <div class="text-center mb-3">
                                <h2 class="text-primary mb-0">
                                    RM {{ number_format($food->price, 2) }}
                                </h2>
                                <small class="text-muted">per {{ $food->serving_size }}</small>
                            </div>
                            
                            <!-- Nutrition Stats -->
                            <div class="stats">
                                <div class="row text-center mb-3">
                                    <div class="col-6">
                                        <div class="nutrition-badge">
                                            <i class="fas fa-fire text-danger"></i>
                                            <strong>{{ $food->calories }}</strong> cal
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="nutrition-badge">
                                            <i class="fas fa-weight-hanging text-info"></i>
                                            <strong>{{ $food->serving_size }}</strong>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row text-center">
                                    <div class="col-3">
                                        <div class="nutrition-badge">
                                            <i class="fas fa-egg text-warning"></i>
                                            <strong>{{ $food->protein }}</strong>g<br>
                                            <small>Protein</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="nutrition-badge">
                                            <i class="fas fa-bread-slice text-success"></i>
                                            <strong>{{ $food->carbs }}</strong>g<br>
                                            <small>Carbs</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="nutrition-badge">
                                            <i class="fas fa-oil-can text-primary"></i>
                                            <strong>{{ $food->fats }}</strong>g<br>
                                            <small>Fats</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="nutrition-badge">
                                            <i class="fas fa-leaf text-success"></i>
                                            <strong>{{ $food->fiber }}</strong>g<br>
                                            <small>Fiber</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer bg-transparent border-0 text-center pb-3">
                            <a href="/foods/{{ $food->id }}" class="btn btn-primary btn-details">
                                <i class="fas fa-info-circle me-2"></i>View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No foods found in this category. Please check other categories.
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Footer Stats -->
        <div class="text-center mt-5 text-white">
            <p>
                <i class="fas fa-database me-2"></i>
                Total Foods: {{ $foods->count() }} | 
                <i class="fas fa-chart-line ms-2 me-2"></i>
                Eat Healthy, Stay Healthy!
            </p>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>