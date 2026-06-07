<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    // Explicitly specify the table name
    protected $table = 'foods';
    
    protected $fillable = [
        'name',
        'category',
        'price',
        'calories',
        'protein',
        'carbs',
        'fats',
        'fiber',
        'serving_size',
        'is_available'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean'
    ];

    public function meals()
{
    return $this->belongsToMany(Meal::class);
}
}
