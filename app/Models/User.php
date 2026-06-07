<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'is_admin', // boolean 
    // student fields
    'age',
    'gender',
    'weight_kg',
    'height_cm',
    'activity_level',
    'goal',
    'budget_rm',
    'bmr_calories',
    'tdee_calories',
    'target_calories_per_day',
])]

#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean', //add this
        ];
    }

    // ::::::::: BMR CALCULATION METHODS ::::::::::
    /** 
     * CALCULATE THE BMR USING MIFFLIN-ST JEOR FORMULA
     */
    public function calculateBMR()
    {
        if ($this->gender == 'male'){
            return (10 * $this->weight_kg) + (6.25 * $this->height_cm) - (5 * $this->age) + 5;
        } else {
            return (10 * $this->weight_kg) + (6.25 * $this->height_cm) - (5 * $this->age) - 161;
        }
    }

    /**
     * Calculate TDEE (Total Daily Energy Expenditure)
     */
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

    /** 
     * Calculate the Daiy Target 
     */
    public function calculateTargetCalories($tdee)
    {
        switch ($this->goal){
            case 'lose':
                return max(1200, $tdee - 500);
            case 'gain':
                return $tdee + 300;
            default:
                return $tdee;       
        }
    }

    /**
     * GEt calorie target per meal
     */
    public function getCaloriesPerMeal($mealsPerDay = 3)
    {
        return round($this->target_calories_per_day / $mealsPerDay);
    }

    // Get Goal Advice
    public function getGoalAdvice()
    {
        switch ($this->goal){
            case 'lose':
                return "Aim for {$this->getCaloriesPerMeal()} calories per meal. Prioritize protein to preserve muscle while losing fat. ";
            case 'gain':
                return "Aim for {$this->getCaloriesPerMeal()} calories per meal. Include carbs and protein for muscle growth.";
            case 'maintain':
                return "Aim for {$this->getCaloriesPerMeal()} calories per meal. Keep balanced nutrition with adequate protein.";
            default:
                return "Stay consistent with your nutrition goals!";
    }
    }

    //check if user is admin or not
    public function isAdmin()
    {
        return $this->is_admin === true;

    }
    // check if user is student
    public function isStudent()
    {
        return $this->is_admin === false;
    }

    // ======== RELATIONSHIP ==========
    // Meal Recommendations relationship
    public function mealRecommendations()
    {
        return $this->hasMany(mealRecommendation::class);
    }

    


}
