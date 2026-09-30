@extends('layouts.app')

@section('title', 'Weekly Meal Planner')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">📅 Weekly Meal Planner</h1>

        <p class="text-muted">
            {{ $startDate->format('d M Y') }}
            -
            {{ $endDate->format('d M Y') }}
        </p>
    </div>

    <a
        href="{{ route('meal-plans.create') }}"
        class="btn btn-primary"
    >
        ➕ Plan a Meal
    </a>

</div>


<!-- Week Navigation -->

<div class="week-navigation mb-4">

    <a
        href="{{ route('meal-plans.index', ['date' => $startDate->copy()->subWeek()->format('Y-m-d')]) }}"
        class="btn btn-outline-primary"
    >
        ← Previous Week
    </a>

    <a
        href="{{ route('meal-plans.index') }}"
        class="btn btn-outline-success"
    >
        📅 Current Week
    </a>

    <a
        href="{{ route('meal-plans.index', ['date' => $startDate->copy()->addWeek()->format('Y-m-d')]) }}"
        class="btn btn-outline-primary"
    >
        Next Week →
    </a>

</div>


<!-- Weekly Calendar -->

<div class="row g-3">

    @for($i = 0; $i < 7; $i++)

        @php
            $currentDate = $startDate->copy()->addDays($i);

            $dayMeals = $mealPlans->filter(function ($mealPlan) use ($currentDate) {
                return $mealPlan->date->format('Y-m-d') === $currentDate->format('Y-m-d');
            });
        @endphp

        <div class="col-md-6 col-lg">

            <div class="card day-card border-0 shadow-sm h-100">

                <div class="day-header">

                    <h5 class="fw-bold mb-0">
                        {{ $currentDate->format('D') }}
                    </h5>

                    <small>
                        {{ $currentDate->format('d M') }}
                    </small>

                </div>


                <div class="card-body">

                    @if($dayMeals->count() > 0)

                        @foreach($dayMeals as $meal)

                            <div class="meal-item mb-3">

                                <span class="badge bg-success">
                                    {{ $meal->meal_type }}
                                </span>

                                <div class="fw-bold mt-2">
                                    🍽️ {{ $meal->recipe->title }}
                                </div>

                                <div class="mt-2">

                                    <a
                                        href="{{ route('meal-plans.edit', $meal->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        ✏️
                                    </a>

                                    <form
                                        action="{{ route('meal-plans.destroy', $meal->id) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this meal plan?')"
                                        >
                                            🗑️
                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach

                    @else

                        <div class="text-center text-muted py-4">

                            <div style="font-size: 35px;">
                                🍽️
                            </div>

                            <small>
                                No meal planned
                            </small>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    @endfor

</div>


<style>

.week-navigation {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
}

.day-card {
    border-radius: 18px;
    overflow: hidden;
    transition: 0.3s;
}

.day-card:hover {
    transform: translateY(-4px);
}

.day-header {
    padding: 15px;
    text-align: center;
    background: linear-gradient(
        135deg,
        #ffd6a5,
        #ffb6c1
    );
}

.meal-item {
    padding: 12px;
    border-radius: 12px;
    background: #fff7f0;
}

</style>

@endsection