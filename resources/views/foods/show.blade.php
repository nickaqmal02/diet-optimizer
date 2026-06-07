{{-- resources/views/foods/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $food->name }} - Nutrition App</title>
    
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
        .detail-card {
            border-radius: 20px;
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .detail-card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .food-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }
        .food-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .category-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 25px;
            background: rgba(255,255,255,0.2);
            font-size: 14px;
        }
        .card-body {
            padding: 30px;
        }
        .nutrition-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .nutrition-item {
            text-align: center;
            padding: 15px;
            border-radius: 12px;
            background: white;
            transition: transform 0.2s ease;
        }
        .nutrition-item:hover {
            transform: scale(1.05);
        }
        .nutrition-value {
            font-size: 28px;
            font-weight: bold;
            margin: 10px 0;
        }
        .nutrition-label {
            color: #6c757d;
            font-size: 14px;
        }
        .price-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        .price-amount {
            font-size: 48px;
            font-weight: bold;
        }
        .serving-size {
            font-size: 16px;
            opacity: 0.9;
        }
        .btn-back {
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: bold;
        }
        .action-buttons {
            margin-top: 30px;
            text-align: center;
        }
        .nutrition-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <!-- Back Button -->
                <a href="/foods" class="btn btn-light btn-back mb-4">
                    <i class="fas fa-arrow-left me-2"></i>Back to All Foods
                </a>
                
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <!-- Main Food Card -->
                <div class="card detail-card shadow">
                    <div class="card-header">
                        <div class="food-icon">
                            <i class="fas fa-{{ $food->category == 'Protein' ? 'drumstick-bite' : ($food->category == 'Carbs' ? 'bread-slice' : ($food->category == 'Vegetables' ? 'leaf' : 'apple-alt')) }} fa-3x"></i>
                        </div>
                        <div class="food-name">{{ $food->name }}</div>
                        <div class="category-badge">
                            <i class="fas fa-tag me-2"></i>{{ $food->category }}
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <!-- Price Section -->
                        <div class="price-box">
                            <div class="serving-size">
                                <i class="fas fa-weight-hanging me-2"></i>{{ $food->serving_size }}
                            </div>
                            <div class="price-amount">
                                ${{ number_format($food->price, 2) }}
                            </div>
                            <div class="serving-size mt-2">
                                per serving
                            </div>
                        </div>
                        
                        <!-- Nutrition Facts -->
                        <div class="nutrition-section">
                            <h4 class="text-center mb-4">
                                <i class="fas fa-chart-line me-2"></i>
                                Nutrition Facts
                            </h4>
                            
                            <div class="nutrition-grid">
                                <!-- Calories -->
                                <div class="nutrition-item">
                                    <i class="fas fa-fire fa-2x text-danger"></i>
                                    <div class="nutrition-value">{{ $food->calories }}</div>
                                    <div class="nutrition-label">Calories</div>
                                </div>
                                
                                <!-- Protein -->
                                <div class="nutrition-item">
                                    <i class="fas fa-egg fa-2x text-warning"></i>
                                    <div class="nutrition-value">{{ $food->protein }}g</div>
                                    <div class="nutrition-label">Protein</div>
                                </div>
                                
                                <!-- Carbs -->
                                <div class="nutrition-item">
                                    <i class="fas fa-bread-slice fa-2x text-success"></i>
                                    <div class="nutrition-value">{{ $food->carbs }}g</div>
                                    <div class="nutrition-label">Carbohydrates</div>
                                </div>
                                
                                <!-- Fats -->
                                <div class="nutrition-item">
                                    <i class="fas fa-oil-can fa-2x text-primary"></i>
                                    <div class="nutrition-value">{{ $food->fats }}g</div>
                                    <div class="nutrition-label">Fats</div>
                                </div>
                                
                                <!-- Fiber -->
                                <div class="nutrition-item">
                                    <i class="fas fa-leaf fa-2x text-success"></i>
                                    <div class="nutrition-value">{{ $food->fiber }}g</div>
                                    <div class="nutrition-label">Fiber</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Info -->
                        <div class="alert alert-info text-center" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            This item is available in {{ $food->serving_size }} serving size.
                            @if($food->is_available)
                                <span class="badge bg-success ms-2">
                                    <i class="fas fa-check-circle me-1"></i>In Stock
                                </span>
                            @else
                                <span class="badge bg-danger ms-2">
                                    <i class="fas fa-times-circle me-1"></i>Out of Stock
                                </span>
                            @endif
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="/foods" class="btn btn-outline-secondary btn-back me-2">
                                <i class="fas fa-list me-2"></i>All Foods
                            </a>
                            <a href="/foods/{{ $food->id }}/edit" class="btn btn-primary btn-back">
                                <i class="fas fa-edit me-2"></i>Edit Food
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>