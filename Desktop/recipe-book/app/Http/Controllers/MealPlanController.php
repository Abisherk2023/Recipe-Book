<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use App\Models\Recipe;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index(Request $request)
{
    $startDate = $request->date
        ? \Carbon\Carbon::parse($request->date)->startOfWeek()
        : now()->startOfWeek();

    $endDate = $startDate->copy()->endOfWeek();

    $mealPlans = MealPlan::with('recipe')
        ->whereBetween('date', [$startDate, $endDate])
        ->orderBy('date')
        ->get();

    return view('meal-plans.index', compact(
        'mealPlans',
        'startDate',
        'endDate'
    ));
}
    public function create()
    {
        $recipes = Recipe::all();

        return view('meal-plans.create', compact('recipes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'meal_type' => 'required|in:Breakfast,Lunch,Dinner',
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        MealPlan::create($validated);

        return redirect()
            ->route('meal-plans.index')
            ->with('success', 'Meal planned successfully!');
    }


    public function edit(MealPlan $mealPlan)
{
    $recipes = Recipe::all();

    return view('meal-plans.edit', compact('mealPlan', 'recipes'));
}

public function update(Request $request, MealPlan $mealPlan)
{
    $validated = $request->validate([
        'date' => 'required|date',
        'meal_type' => 'required|in:Breakfast,Lunch,Dinner',
        'recipe_id' => 'required|exists:recipes,id',
    ]);

    $mealPlan->update($validated);

    return redirect()
        ->route('meal-plans.index')
        ->with('success', 'Meal plan updated successfully!');
}

    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();

        return redirect()
            ->route('meal-plans.index')
            ->with('success', 'Meal plan deleted successfully!');
    }
}