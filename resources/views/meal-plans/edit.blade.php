@extends('layouts.app')

@section('title', 'Edit Meal Plan')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card border-0 shadow-lg form-card">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <div class="form-icon">✏️</div>

                    <h2 class="fw-bold">
                        Edit Meal Plan
                    </h2>

                    <p class="text-muted">
                        Update your meal plan.
                    </p>

                </div>

                <form
                    action="{{ route('meal-plans.update', $mealPlan->id) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')

                    <!-- Date -->

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            📅 Date
                        </label>

                        <input
                            type="date"
                            name="date"
                            class="form-control form-control-lg"
                            value="{{ old('date', $mealPlan->date->format('Y-m-d')) }}"
                            required
                        >

                    </div>

                    <!-- Meal Type -->

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            🍴 Meal Type
                        </label>

                        <select
                            name="meal_type"
                            class="form-select form-select-lg"
                            required
                        >

                            <option value="Breakfast"
                                {{ old('meal_type', $mealPlan->meal_type) == 'Breakfast' ? 'selected' : '' }}>
                                🍳 Breakfast
                            </option>

                            <option value="Lunch"
                                {{ old('meal_type', $mealPlan->meal_type) == 'Lunch' ? 'selected' : '' }}>
                                🍱 Lunch
                            </option>

                            <option value="Dinner"
                                {{ old('meal_type', $mealPlan->meal_type) == 'Dinner' ? 'selected' : '' }}>
                                🍝 Dinner
                            </option>

                        </select>

                    </div>

                    <!-- Recipe -->

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            🍽️ Recipe
                        </label>

                        <select
                            name="recipe_id"
                            class="form-select form-select-lg"
                            required
                        >

                            @foreach($recipes as $recipe)

                                <option
                                    value="{{ $recipe->id }}"
                                    {{ old('recipe_id', $mealPlan->recipe_id) == $recipe->id ? 'selected' : '' }}
                                >
                                    {{ $recipe->title }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="d-flex gap-3">

                        <button
                            type="submit"
                            class="btn btn-success btn-lg flex-grow-1"
                        >
                            💾 Update Meal Plan
                        </button>

                        <a
                            href="{{ route('meal-plans.index') }}"
                            class="btn btn-secondary btn-lg"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<style>

.form-card {
    border-radius: 25px;
    background: linear-gradient(135deg, #fff8f0, #fff0f6);
}

.form-icon {
    font-size: 70px;
    margin-bottom: 10px;
}

.form-control,
.form-select {
    border-radius: 12px;
}

</style>

@endsection