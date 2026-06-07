<?php

namespace App\Services;

use App\Models\Food;
use App\Models\User;

class LPSolverService
{
    // lets find the optimal food combination for a student
    public function optimize(User $user, $budget)
    {
        $calorieTarget = $user->getCaloriesPerMeal();
        $availableFoods = Food::where('is_available', true)->get();

        $bestCombination = null;
        $bestProtein = 0;
        $bestCalories = 0;

        // try combinations of up to 4 food items
        $combinations  = $this->generateCombinations($availableFoods, 4);

        foreach ($combinations as $combination){
            $totalPrice = 0;
            $totalCalories = 0;
            $totalProtein = 0;
            $totalCarbs = 0;
            $totalFats = 0;

            foreach ($combination as $food){
                $totalPrice += $food->price;
                $totalCalories += $food->calories;
                $totalProtein += $food->protein;
                $totalCarbs += $food->carbs;
                $totalFats += $food->fats;
            }

            // check constrains
            if ($totalPrice > $budget) continue;

            // check calorie constraint based on goal
            if ($user->goal == 'lose' && $totalCalories > $calorieTarget + 100) continue;
            if ($user->goal == 'gain' && $totalCalories < $calorieTarget - 100) continue;
            if ($user->goal == 'maintain' && ($totalCalories < $calorieTarget - 150 || $totalCalories > $calorieTarget + 150 )) continue;

            // always ensure that protein constrains (at least 15g)
            if ($totalProtein < 15) continue;

            // This combination is valid, check if it better than current best
            if ($totalProtein > $bestProtein){
                $bestProtein = $totalProtein;
                $bestCombination = $combination;
                $bestCalories = $totalCalories;
            }

        }

        return [
            'foods' => $bestCombination,
            'total_protein' => $bestProtein,
            'total_calories' => $bestCalories,
            'total_price' => $bestCombination ? array_sum(array_column($bestCombination, 'price')) : 0,
            'protein_per_rm' => $bestCombination ? round($bestProtein / array_sum(array_column($bestCombination, 'price')), 2) : 0
        ];


    }

    private function generateCombinations($foods, $maxItems)
    {
        $combinations = [];
        $count = count($foods);

        // single items
        for ($i = 0; $i < $count; $i++){
            $combinations[] = [$foods[$i]];
        }

        // two items 
        for ($i = 0; $i < $count; $i++){
            for ($j = $i + 1; $j < $count; $j++){
                $combinations[] = [$foods[$i], $foods[$j]];
            }
        }

        // Three items
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                for ($k = $j + 1; $k < $count; $k++) {
                    $combinations[] = [$foods[$i], $foods[$j], $foods[$k]];
                }
            }
        }

        // Four items
        if ($maxItems >= 4) {
            for ($i = 0; $i < $count; $i++) {
                for ($j = $i + 1; $j < $count; $j++) {
                    for ($k = $j + 1; $k < $count; $k++) {
                        for ($l = $k + 1; $l < $count; $l++) {
                            $combinations[] = [$foods[$i], $foods[$j], $foods[$k], $foods[$l]];
                        }
                    }
                }
            }
        }

        return $combinations;

    }
}