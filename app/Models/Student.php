<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'age', 'gender', 'weight_kg', 'height_cm',
        'activity_level', 'goal', 'budget_rm'
    ];
    
    // Auto-calculate BMR, TDEE, and Target Calories when saving
    protected static function booted()
    {
        static::creating(function ($student) {
            // Calculate in correct order
            $bmr = $student->calculateBMR();
            $student->bmr_calories = $bmr;
            $student->tdee_calories = $student->calculateTDEE($bmr);
            $student->target_calories_per_day = $student->calculateTargetCalories($student->tdee_calories);
        });
        
        static::updating(function ($student) {
            $bmr = $student->calculateBMR();
            $student->bmr_calories = $bmr;
            $student->tdee_calories = $student->calculateTDEE($bmr);
            $student->target_calories_per_day = $student->calculateTargetCalories($student->tdee_calories);
        });
    }
    
    public function calculateBMR()
    {
        if ($this->gender == 'male') {
            return (10 * $this->weight_kg) + (6.25 * $this->height_cm) - (5 * $this->age) + 5;
        } else {
            return (10 * $this->weight_kg) + (6.25 * $this->height_cm) - (5 * $this->age) - 161;
        }
    }
    
    public function calculateTDEE($bmr)
    {
        $multipliers = [
            'sedentary' => 1.2,
            'light' => 1.375,
            'moderate' => 1.55,
            'active' => 1.725,
            'very_active' => 1.9,
        ];
        
        $multiplier = $multipliers[$this->activity_level] ?? 1.2;
        return round($bmr * $multiplier, 2);
    }
    
    public function calculateTargetCalories($tdee)
    {
        switch ($this->goal) {
            case 'lose':
                return max(1200, $tdee - 500);
            case 'gain':
                return $tdee + 300;
            default:
                return $tdee;
        }
    }
    
    public function getCaloriesPerMeal($mealsPerDay = 3)
    {
        return round($this->target_calories_per_day / $mealsPerDay);
    }

    public function getGoalAdvice()
    {
        switch ($this->goal) {
            case 'lose':
                return "Aim for {$this->getCaloriesPerMeal()} calories per meal. Prioritize protein to preserve muscle while losing fat.";
            case 'gain':
                return "Aim for {$this->getCaloriesPerMeal()} calories per meal. Include carbs and protein for muscle growth.";
            case 'maintain':
                return "Aim for {$this->getCaloriesPerMeal()} calories per meal. Keep balanced nutrition with adequate protein.";
            default:
                return "Stay consistent with your nutrition goals!";
    }
    }
}