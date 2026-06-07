<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->decimal('weight_kg', 5, 1)->nullable();
            $table->decimal('height_cm', 5, 1)->nullable();
            $table->string('activity_level')->nullable();
            $table->string('goal')->nullable();
            $table->decimal('budget_rm', 8, 2)->nullable();
            $table->decimal('bmr_calories', 8, 2)->nullable();
            $table->decimal('tdee_calories', 8, 2)->nullable();
            $table->decimal('target_calories_per_day', 8, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'age', 'gender', 'weight_kg', 'height_cm', 
                'activity_level', 'goal', 'budget_rm',
                'bmr_calories', 'tdee_calories', 'target_calories_per_day'
            ]);
        });
    }
};
