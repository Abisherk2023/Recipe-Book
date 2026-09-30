@extends('layouts.app')

@section('title', 'My Recipes')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold">🍽️ My Recipes</h1>
        <p class="text-muted">Find your favorite recipes</p>
    </div>

    <a href="{{ route('recipes.create') }}" class="btn btn-primary">
        ➕ Add Recipe
    </a>
</div>

<!-- Search & Filter -->
<div class="card border-0 shadow-sm mb-4 search-card">
    <div class="card-body p-4">

        <form action="{{ route('recipes.index') }}" method="GET">

            <div class="row g-3">

                <!-- Search -->
                <div class="col-md-6">
                    <label class="form-label fw-bold">
                        🔍 Search Recipe
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control form-control-lg"
                        placeholder="Search by recipe name..."
                        value="{{ $search }}"
                    >
                </div>

                <!-- Category -->
                <div class="col-md-4">
                    <label class="form-label fw-bold">
                        🍴 Category
                    </label>

                    <select name="category" class="form-select form-select-lg">

                        <option value="">All Categories</option>

                        @foreach($categories as $cat)
                            <option
                                value="{{ $cat->id }}"
                                {{ $category == $cat->id ? 'selected' : '' }}
                            >
                                {{ $cat->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Button -->
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success btn-lg w-100">
                        🔎 Search
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>


<!-- Recipe Cards -->

@if($recipes->count() > 0)

<div class="row g-4">

    @foreach($recipes as $recipe)

        <div class="col-md-6 col-lg-4">

            <div class="card recipe-card h-100 border-0 shadow-sm">

                <div class="recipe-image">
                    🍳
                </div>

                <div class="card-body">

                    <h4 class="fw-bold">
                        {{ $recipe->title }}
                    </h4>

                    <p class="text-muted">
                        {{ Str::limit($recipe->description, 100) }}
                    </p>

                    <div class="mb-3">

                        <span class="badge bg-warning text-dark">
                            ⏱️ {{ $recipe->cooking_time }} min
                        </span>

                        <span class="badge bg-info text-dark">
                            ⭐ {{ $recipe->difficulty }}
                        </span>

                        @if($recipe->category)
                            <span class="badge bg-success">
                                🍴 {{ $recipe->category->name }}
                            </span>
                        @endif

                    </div>

                    <div class="d-flex gap-2">

                        <a
                            href="{{ route('recipes.show', $recipe->id) }}"
                            class="btn btn-primary btn-sm"
                        >
                            👁️ View
                        </a>

                        <a
                            href="{{ route('recipes.edit', $recipe->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            ✏️ Edit
                        </a>

                        <form
                            action="{{ route('recipes.destroy', $recipe->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this recipe?')"
                            >
                                🗑️ Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>

@else

<div class="text-center py-5">

    <div style="font-size: 70px;">🍽️</div>

    <h3>No recipes found</h3>

    <p class="text-muted">
        Try another search or category.
    </p>

    <a href="{{ route('recipes.create') }}" class="btn btn-primary">
        ➕ Add Recipe
    </a>

</div>

@endif


<style>

.search-card {
    border-radius: 20px;
    background: linear-gradient(135deg, #fff8f0, #fff0f6);
}

.form-control,
.form-select {
    border-radius: 12px;
}

.recipe-card {
    border-radius: 20px;
    overflow: hidden;
    transition: 0.3s;
}

.recipe-card:hover {
    transform: translateY(-5px);
}

.recipe-image {
    height: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 70px;
    background: linear-gradient(135deg, #ffd6a5, #ffb6c1);
}

</style>

@endsection