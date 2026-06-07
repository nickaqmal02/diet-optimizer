<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age');
            $table->string('gender');  // Changed from enum to string
            $table->decimal('weight_kg', 5, 1);
            $table->decimal('height_cm', 5, 1);
            $table->string('activity_level');  // Changed from enum to string
            $table->string('goal');  // Changed from enum to string
            $table->decimal('budget_rm', 8, 2);
            $table->decimal('bmr_calories', 8, 2);
            $table->decimal('tdee_calories', 8, 2);
            $table->decimal('target_calories_per_day', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};