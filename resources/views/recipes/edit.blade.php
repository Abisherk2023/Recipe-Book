@extends('layouts.app')

@section('title', 'Edit Recipe')

@section('content')

<div class="edit-container">

    <div class="edit-header">
        <div class="edit-icon">✏️</div>

        <div>
            <h1>Edit Recipe</h1>
            <p>Update your recipe details</p>
        </div>
    </div>


    <div class="form-card">

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">

            @csrf
            @method('PUT')


            <!-- Title -->

            <div class="mb-4">
                <label class="form-label">
                    🍽️ Recipe Title
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $recipe->title) }}"
                    required
                >
            </div>


            <!-- Description -->

            <div class="mb-4">
                <label class="form-label">
                    📝 Description
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4"
                    required
                >{{ old('description', $recipe->description) }}</textarea>
            </div>


            <!-- Ingredients -->

            <div class="mb-4">
                <label class="form-label">
                    🥕 Ingredients
                </label>

                <textarea
                    name="ingredients"
                    class="form-control"
                    rows="6"
                    required
                >{{ old('ingredients', $recipe->ingredients) }}</textarea>
            </div>


            <!-- Instructions -->

            <div class="mb-4">
                <label class="form-label">
                    👨‍🍳 Cooking Instructions
                </label>

                <textarea
                    name="instructions"
                    class="form-control"
                    rows="6"
                    required
                >{{ old('instructions', $recipe->instructions) }}</textarea>
            </div>


            <div class="row">

                <!-- Cooking Time -->

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        ⏱️ Cooking Time (minutes)
                    </label>

                    <input
                        type="number"
                        name="cooking_time"
                        class="form-control"
                        value="{{ old('cooking_time', $recipe->cooking_time) }}"
                        min="1"
                        required
                    >

                </div>


                <!-- Difficulty -->

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        ⭐ Difficulty
                    </label>

                    <select
                        name="difficulty"
                        class="form-select"
                        required
                    >

                        <option value="">Select Difficulty</option>

                        <option
                            value="Easy"
                            {{ old('difficulty', $recipe->difficulty) == 'Easy' ? 'selected' : '' }}
                        >
                            Easy
                        </option>

                        <option
                            value="Medium"
                            {{ old('difficulty', $recipe->difficulty) == 'Medium' ? 'selected' : '' }}
                        >
                            Medium
                        </option>

                        <option
                            value="Hard"
                            {{ old('difficulty', $recipe->difficulty) == 'Hard' ? 'selected' : '' }}
                        >
                            Hard
                        </option>

                    </select>

                </div>

            </div>


            <!-- Category -->

            <div class="mb-4">

                <label class="form-label">
                    🍴 Category
                </label>

                <select
                    name="category_id"
                    class="form-select"
                    required
                >

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $recipe->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Buttons -->

            <div class="text-center mt-4">

                <button
                    type="submit"
                    class="btn btn-primary btn-lg me-2"
                >
                    💾 Update Recipe
                </button>

                <a
                    href="{{ route('recipes.show', $recipe->id) }}"
                    class="btn btn-secondary btn-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>


<style>

    .edit-container {
        max-width: 900px;
        margin: auto;
    }

    .edit-header {
        display: flex;
        align-items: center;
        gap: 20px;

        padding: 30px;

        margin-bottom: 25px;

        border-radius: 25px;

        background:
            linear-gradient(
                135deg,
                #ffecd2,
                #fcb69f,
                #fbc2eb
            );

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.10);
    }

    .edit-icon {
        font-size: 65px;
    }

    .edit-header h1 {
        margin: 0;
        color: #7a1f4b;
        font-weight: 800;
    }

    .edit-header p {
        margin: 5px 0 0;
        color: #6c4b55;
    }

    .form-card {
        background: white;

        padding: 40px;

        border-radius: 25px;

        box-shadow:
            0 10px 35px rgba(0, 0, 0, 0.10);
    }

    .form-label {
        font-weight: 600;
        color: #7a1f4b;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 13px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #f72585;

        box-shadow:
            0 0 0 0.2rem rgba(247, 37, 133, 0.15);
    }

</style>

@endsection