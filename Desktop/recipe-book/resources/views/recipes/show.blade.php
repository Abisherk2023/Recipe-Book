@extends('layouts.app')

@section('title', $recipe->title)

@section('content')

<div class="recipe-details">

    <!-- Recipe Header -->

    <div class="recipe-header">

        <div class="recipe-big-icon">
            🍳
        </div>

        <div>
            <h1>{{ $recipe->title }}</h1>

            <p>
                {{ $recipe->description }}
            </p>
        </div>

    </div>


    <!-- Recipe Information -->

    <div class="row mt-4">

        <div class="col-md-3 mb-3">

            <div class="info-box">

                <div class="info-icon">
                    ⏱️
                </div>

                <h6>Cooking Time</h6>

                <strong>
                    {{ $recipe->cooking_time }} minutes
                </strong>

            </div>

        </div>


        <div class="col-md-3 mb-3">

            <div class="info-box">

                <div class="info-icon">
                    ⭐
                </div>

                <h6>Difficulty</h6>

                <strong>
                    {{ $recipe->difficulty }}
                </strong>

            </div>

        </div>


        <div class="col-md-3 mb-3">

            <div class="info-box">

                <div class="info-icon">
                    🍴
                </div>

                <h6>Category</h6>

                <strong>
                    {{ $recipe->category?->name ?? 'Uncategorized' }}
                </strong>

            </div>

        </div>


        <div class="col-md-3 mb-3">

            <div class="info-box">

                <div class="info-icon">
                    📅
                </div>

                <h6>Created</h6>

                <strong>
                    {{ $recipe->created_at->format('d M Y') }}
                </strong>

            </div>

        </div>

    </div>


    <!-- Ingredients & Instructions -->

    <div class="row mt-4">

        <!-- Ingredients -->

        <div class="col-md-5 mb-4">

            <div class="recipe-section ingredients-section">

                <h2>
                    🥕 Ingredients
                </h2>

                <div class="recipe-text">
                    {!! nl2br(e($recipe->ingredients)) !!}
                </div>

            </div>

        </div>


        <!-- Instructions -->

        <div class="col-md-7 mb-4">

            <div class="recipe-section instructions-section">

                <h2>
                    👨‍🍳 Cooking Instructions
                </h2>

                <div class="recipe-text">
                    {!! nl2br(e($recipe->instructions)) !!}
                </div>

            </div>

        </div>

    </div>


    <!-- Buttons -->

    <div class="text-center mt-3">

        <a
            href="{{ route('recipes.index') }}"
            class="btn btn-secondary"
        >
            ← Back to Recipes
        </a>

        <a
            href="{{ route('recipes.edit', $recipe->id) }}"
            class="btn btn-warning"
        >
            ✏️ Edit Recipe
        </a>

    </div>

</div>


<style>

    .recipe-header {

        display: flex;

        align-items: center;

        gap: 30px;

        padding: 40px;

        border-radius: 25px;

        background:
            linear-gradient(
                135deg,
                #ff9a9e,
                #fad0c4,
                #fbc2eb
            );

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.10);

    }


    .recipe-big-icon {

        font-size: 90px;

    }


    .recipe-header h1 {

        font-size: 2.8rem;

        color: #7a1f4b;

        font-weight: 800;

    }


    .recipe-header p {

        color: #5c3b45;

        font-size: 1.1rem;

        margin: 0;

    }


    .info-box {

        background: white;

        text-align: center;

        padding: 25px 15px;

        border-radius: 18px;

        box-shadow:
            0 7px 20px rgba(0, 0, 0, 0.08);

        height: 100%;

    }


    .info-icon {

        font-size: 35px;

        margin-bottom: 10px;

    }


    .info-box h6 {

        color: #777;

        margin-bottom: 8px;

    }


    .info-box strong {

        color: #d63384;

    }


    .recipe-section {

        background: white;

        border-radius: 20px;

        padding: 30px;

        height: 100%;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.08);

    }


    .recipe-section h2 {

        color: #d63384;

        font-weight: 700;

        margin-bottom: 20px;

    }


    .ingredients-section {

        border-top: 6px solid #ffc107;

    }


    .instructions-section {

        border-top: 6px solid #20c997;

    }


    .recipe-text {

        white-space: normal;

        line-height: 1.9;

        color: #555;

        font-size: 1.05rem;

    }


    @media (max-width: 768px) {

        .recipe-header {

            flex-direction: column;

            text-align: center;

        }

        .recipe-header h1 {

            font-size: 2rem;

        }

    }

</style>

@endsection