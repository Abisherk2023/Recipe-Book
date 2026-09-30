@extends('layouts.app')

@section('title', 'Shopping List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">🛒 Shopping List</h1>

        <p class="text-muted">
            Ingredients from your planned meals
        </p>
    </div>

    <a href="{{ route('meal-plans.index') }}" class="btn btn-primary">
        📅 Meal Planner
    </a>

</div>


<div class="card border-0 shadow-sm shopping-card">

    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">
            🥕 Ingredients
        </h4>

        @if($ingredients->count() > 0)

            <div class="list-group">

                @foreach($ingredients as $ingredient)

                    <div class="list-group-item shopping-item">

                        <span>
                            🛒 {{ $ingredient }}
                        </span>

                        <input
                            type="checkbox"
                            class="form-check-input"
                        >

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <div style="font-size: 70px;">
                    🛒
                </div>

                <h4>No ingredients yet</h4>

                <p class="text-muted">
                    Plan some meals first.
                </p>

                <a
                    href="{{ route('meal-plans.create') }}"
                    class="btn btn-success"
                >
                    ➕ Plan a Meal
                </a>

            </div>

        @endif

    </div>

</div>


<style>

.shopping-card {
    border-radius: 20px;
    background: linear-gradient(
        135deg,
        #fff8f0,
        #fff0f6
    );
}

.shopping-item {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 15px;

    border-radius: 10px;

    margin-bottom: 8px;
}

.shopping-item:hover {
    background: #fff3e6;
}

</style>

@endsection