<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Food - Nutrition App</title>
    
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
        .form-card {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }
        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .form-body {
            padding: 30px;
        }
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            padding: 12px;
            font-weight: bold;
            font-size: 16px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .required:after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <!-- Back Button -->
                <a href="/foods" class="btn btn-light mb-3">
                    <i class="fas fa-arrow-left me-2"></i>Back to Foods
                </a>
                
                <!-- Form Card -->
                <div class="card form-card shadow">
                    <div class="form-header">
                        <i class="fas fa-plus-circle fa-3x mb-3"></i>
                        <h2 class="mb-0">Add New Food Item</h2>
                        <p class="mb-0 mt-2">Fill in the nutritional information</p>
                    </div>
                    
                    <div class="form-body">
                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <!-- Error Messages -->
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('foods.store') }}">
                            @csrf
                            
                            <!-- Food Name -->
                            <div class="mb-3">
                                <label class="form-label required">Food Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-utensils"></i></span>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" placeholder="e.g., Grilled Chicken" required>
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label required">Category</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                    <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        <option value="Protein" {{ old('category') == 'Protein' ? 'selected' : '' }}>🥩 Protein</option>
                                        <option value="Plant Protein" {{ old('category') == 'Plant Protein' ? 'selected' : '' }}>🌱 Plant Protein</option>
                                        <option value="Carbs" {{ old('category') == 'Carbs' ? 'selected' : '' }}>🍚 Carbs</option>
                                        <option value="Vegetables" {{ old('category') == 'Vegetables' ? 'selected' : '' }}>🥗 Vegetables</option>
                                        <option value="Fruits" {{ old('category') == 'Fruits' ? 'selected' : '' }}>🍎 Fruits</option>
                                        <option value="Dairy" {{ old('category') == 'Dairy' ? 'selected' : '' }}>🥛 Dairy</option>
                                    </select>
                                </div>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <!-- Price -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Price ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" 
                                               value="{{ old('price') }}" placeholder="0.00" required>
                                    </div>
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <!-- Serving Size -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Serving Size</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                                        <input type="text" name="serving_size" class="form-control @error('serving_size') is-invalid @enderror" 
                                               value="{{ old('serving_size') }}" placeholder="e.g., 1 piece, 100g" required>
                                    </div>
                                    @error('serving_size')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Calories -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Calories</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-fire"></i></span>
                                        <input type="number" name="calories" class="form-control @error('calories') is-invalid @enderror" 
                                               value="{{ old('calories') }}" placeholder="0" required>
                                    </div>
                                    @error('calories')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <!-- Protein -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Protein (g)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-egg"></i></span>
                                        <input type="number" step="0.1" name="protein" class="form-control" 
                                               value="{{ old('protein', 0) }}" placeholder="0">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Carbs -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Carbs (g)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-bread-slice"></i></span>
                                        <input type="number" step="0.1" name="carbs" class="form-control" 
                                               value="{{ old('carbs', 0) }}" placeholder="0">
                                    </div>
                                </div>
                                
                                <!-- Fats -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Fats (g)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-oil-can"></i></span>
                                        <input type="number" step="0.1" name="fats" class="form-control" 
                                               value="{{ old('fats', 0) }}" placeholder="0">
                                    </div>
                                </div>
                                
                                <!-- Fiber -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Fiber (g)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-leaf"></i></span>
                                        <input type="number" step="0.1" name="fiber" class="form-control" 
                                               value="{{ old('fiber', 0) }}" placeholder="0">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-submit">
                                    <i class="fas fa-save me-2"></i>Add Food Item
                                </button>
                                
                                <a href="/foods" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>