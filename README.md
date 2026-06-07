# Diet Optimization System - Linear Programming Decision Support System

## Group Members
| Name | Matric Number |
|------|---------------|
| [Your Name] | [Your Matric] |
| [Member 2] | [Matric 2] |
| [Member 3] | [Matric 3] |

## Project Description
A web-based Linear Programming system that helps students find the optimal meal combination within their budget and calorie goals. The system maximizes protein intake subject to budget and calorie constraints.

## Problem Formulation

### Decision Variables
- x₁ = Sardines (3 pieces)
- x₂ = Fried Chicken (1 piece)
- x₃ = Fried Egg
- x₄ = Tempeh (2 pieces)
- x₅ = Tofu (3 pieces)
- x₆ = White Rice
- x₇ = Mixed Vegetables

### Objective Function
MAXIMIZE: 25x₁ + 20x₂ + 7x₃ + 12x₄ + 10x₅ + 4x₆ + 3x₇

### Constraints
1. Budget: 4.5x₁ + 4.0x₂ + 1.8x₃ + 1.5x₄ + 2.0x₅ + 1.5x₆ + 2.5x₇ ≤ RM10
2. Calories: 220x₁ + 290x₂ + 90x₃ + 150x₄ + 120x₅ + 200x₆ + 80x₇ ≤ 664
3. Protein: Total protein ≥ 15g
4. Non-negativity: x₁...x₇ ≥ 0
5. Integer: Quantities are whole numbers

## Technology Stack
- Backend: Laravel 13 (PHP 8.4)
- Database: MySQL (XAMPP)
- Frontend: Blade + Tailwind CSS + Alpine.js
- Authentication: Laravel Breeze

## Installation Instructions

### Prerequisites
- PHP 8.4 or higher
- Composer
- MySQL (XAMPP)
- Node.js (for frontend assets)

### Steps
```bash
1. Clone repository
2. cd diet-optimizer
3. composer install
4. cp .env.example .env
5. Configure database in .env
6. php artisan key:generate
7. php artisan migrate
8. php artisan db:seed --class=FoodSeeder
9. php artisan serve