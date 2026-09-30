<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;

class ShoppingListController extends Controller
{
    public function index()
    {
        $mealPlans = MealPlan::with('recipe')->get();

        $ingredients = collect();

        foreach ($mealPlans as $mealPlan) {

            if ($mealPlan->recipe) {

                $recipeIngredients = explode(
                    ',',
                    $mealPlan->recipe->ingredients
                );

                foreach ($recipeIngredients as $ingredient) {

                    $ingredient = trim($ingredient);

                    if ($ingredient !== '') {
                        $ingredients->push($ingredient);
                    }
                }
            }
        }

        $ingredients = $ingredients
            ->unique()
            ->values();

        return view(
            'shopping-list.index',
            compact('ingredients')
        );
    }
}