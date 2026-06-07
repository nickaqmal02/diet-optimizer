<?php

namespace Database\Seeders;

use App\Models\Food; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // clear existing data
        Food::truncate();
        // define all our foods
        $foods = [
        // Protein - Animal Based food lah
        [
            'name' => 'Sardines (3 pieces)',
            'category' => 'Protein',
            'price' => 4.50,
            'calories' => 220,
            'protein' => 25,
            'carbs' => 0,
            'fats' => 12,
            'fiber' => 0,
            'serving_size' => '3 pieces'
        ],
        [   
            'name' => 'Fried Chicken (1 Piece)',
            'category' => 'Protein',
            'price' => 4.00,
            'calories' => 290,
            'carbs' => 15,
            'protein' => 20,
            'fats' => 18,
            'fiber' => 0,
            'serving_size' => '1 piece'
        ],
        [
            'name' => 'Fried Egg',
            'category' => 'Protein',
            'price' => 1.80,
            'calories' => 90,
            'protein' => 7,
            'carbs' => 1,
            'fats' => 7,
            'fiber' => 0,
            'serving_size' => '1 piece'
        ],
        [
            'name' => 'Boiled Egg (2 pieces)',
            'category' => 'Protein',
            'price' => 2.00,
            'calories' => 140,
            'protein' => 12,
            'carbs' => 1,
            'fats' => 10,
            'fiber' => 0,
            'serving_size' => '2 pieces'
        ],
        [
            'name' => 'Tofu (3 pieces)',
            'category' => 'Plant Protein',
            'price' => 2.00,
            'calories' => 120,
            'protein' => 10,
            'carbs' => 4,
            'fats' => 7,
            'fiber' => 1,
            'serving_size' => '3 pieces'
        ],
        [
            'name' => 'Tempeh (2 pieces)',
            'category' => 'Plant Protein',
            'price' => 1.50,
            'calories' => 150,
            'protein' => 12,
            'carbs' => 8,
            'fats' => 7,
            'fiber' => 2,
            'serving_size' => '2 pieces'
        ],
        [
            'name' => 'White Rice',
            'category' => 'Carbs',
            'price' => 1.50,
            'calories' => 200,
            'protein' => 4,
            'carbs' => 45,
            'fats' => 0,
            'fiber' => 1,
            'serving_size' => '1 plate'
        ],
        [
            'name' => 'Mixed Vegetables',
            'category' => 'Vegetables',
            'price' => 2.50,
            'calories' => 80,
            'protein' => 3,
            'carbs' => 10,
            'fats' => 3,
            'fiber' => 4,
            'serving_size' => '1 serving'
        ],
    ];
    // beza sikit with python foods yg main dekat depan
    foreach ($foods as $food){
        Food::create($food);
    }

    $this->command->info('Food seeder completed! '. count($foods) . 'foods added.');
    }
}
