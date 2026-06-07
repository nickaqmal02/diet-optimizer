<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealRecommendation extends Model
{
    protected $fillable = [
        'user_id',
        'budget_used',
        'total_calories',
        'total_protein',
        'total_price',
        'food_combination'
    ];
    
    protected $casts = [
        'food_combination' => 'array',
        'budget_used' => 'decimal:2',
        'total_price' => 'decimal:2'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}