@extends('layouts.app')

@section('title', 'Add Recipe')

@section('content')

<div class="container">

    <h1 class="mb-4">Add New Recipe</h1>

    <form action="{{ route('recipes.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Recipe Title</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea
                name="description"
                class="form-control"
                rows="3"
                required
            >{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Ingredients</label>
            <textarea
                name="ingredients"
                class="form-control"
                rows="5"
                required
            >{{ old('ingredients') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Instructions</label>
            <textarea
                name="instructions"
                class="form-control"
                rows="5"
                required
            >{{ old('instructions') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Cooking Time (minutes)</label>
            <input
                type="number"
                name="cooking_time"
                class="form-control"
                value="{{ old('cooking_time') }}"
                min="1"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Difficulty</label>

            <select name="difficulty" class="form-select" required>
                <option value="">Select Difficulty</option>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
        </div>

        <!-- Category -->

        <div class="mb-3">
            <label class="form-label">Category</label>

            <select name="category_id" class="form-select" required>

                <option value="">Select Category</option>

                @foreach ($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Recipe
        </button>

        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection