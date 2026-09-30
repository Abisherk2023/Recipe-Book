@extends('layouts.app')

@section('title', 'Plan a Meal')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card border-0 shadow-lg form-card">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <div class="form-icon">
                        📅
                    </div>

                    <h2 class="fw-bold">
                        Plan a Meal
                    </h2>

                    <p class="text-muted">
                        Choose a date, meal type and recipe.
                    </p>

                </div>

                <form
                    action="{{ route('meal-plans.store') }}"
                    method="POST"
                >

                    @csrf

                    <!-- Date -->

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            📅 Date
                        </label>

                        <input
                            type="date"
                            name="date"
                            class="form-control form-control-lg"
                            value="{{ old('date') }}"
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

                            <option value="">
                                Select Meal Type
                            </option>

                            <option value="Breakfast">
                                🍳 Breakfast
                            </option>

                            <option value="Lunch">
                                🍱 Lunch
                            </option>

                            <option value="Dinner">
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

                            <option value="">
                                Select Recipe
                            </option>

                            @foreach($recipes as $recipe)

                                <option
                                    value="{{ $recipe->id }}"
                                    {{ old('recipe_id') == $recipe->id ? 'selected' : '' }}
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
                            ✅ Save Meal Plan
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