<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('meal_plans', function (Blueprint $table) {
        $table->id();

        $table->date('date');

        $table->enum('meal_type', [
            'Breakfast',
            'Lunch',
            'Dinner'
        ]);

        $table->foreignId('recipe_id')
            ->constrained('recipes')
            ->cascadeOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('meal_plans');
}
};
