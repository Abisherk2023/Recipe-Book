@extends('layouts.app')

@section('title', 'Recipe Book')

@section('content')

<!-- Hero Section -->

<div class="hero-section text-center">

    <div class="hero-content">

        <div class="hero-icon">
            🍳
        </div>

        <h1>
            Welcome to My Recipe Book
        </h1>

        <p>
            Discover delicious recipes, organize your meals,
            and enjoy cooking every day!
        </p>

        <div class="mt-4">

            <a href="{{ route('recipes.index') }}"
               class="btn btn-primary btn-lg me-2">
                🍽️ Explore Recipes
            </a>

            <a href="{{ route('recipes.create') }}"
               class="btn btn-warning btn-lg">
                ➕ Add Recipe
            </a>

        </div>

    </div>

</div>


<!-- Features -->

<div class="row text-center mt-5">

    <div class="col-md-4 mb-4">

        <div class="feature-card">

            <div class="feature-icon">
                🍕
            </div>

            <h4>Delicious Recipes</h4>

            <p>
                Store and manage all your favorite recipes
                in one place.
            </p>

        </div>

    </div>


    <div class="col-md-4 mb-4">

        <div class="feature-card">

            <div class="feature-icon">
                🥗
            </div>

            <h4>Organize Meals</h4>

            <p>
                Organize recipes by categories such as
                breakfast, lunch and dinner.
            </p>

        </div>

    </div>


    <div class="col-md-4 mb-4">

        <div class="feature-card">

            <div class="feature-icon">
                🍰
            </div>

            <h4>Easy Cooking</h4>

            <p>
                Keep ingredients and cooking instructions
                easy to find.
            </p>

        </div>

    </div>

</div>


<style>

    .hero-section {
        min-height: 450px;
        display: flex;
        align-items: center;
        justify-content: center;

        background:
            linear-gradient(
                135deg,
                #ff9a9e,
                #fad0c4,
                #fbc2eb
            );

        border-radius: 30px;

        padding: 60px 20px;

        box-shadow:
            0 15px 40px rgba(0, 0, 0, 0.12);
    }


    .hero-content {
        max-width: 750px;
    }


    .hero-icon {
        font-size: 70px;
        margin-bottom: 15px;
    }


    .hero-section h1 {
        font-size: 3rem;
        font-weight: 800;
        color: #7a1f4b;
    }


    .hero-section p {
        font-size: 1.2rem;
        color: #5c3b45;
        margin-top: 20px;
    }


    .feature-card {
        background: white;

        border-radius: 20px;

        padding: 30px 20px;

        height: 100%;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.10);

        transition: 0.3s;
    }


    .feature-card:hover {
        transform: translateY(-8px);

        box-shadow:
            0 15px 30px rgba(0, 0, 0, 0.15);
    }


    .feature-icon {
        font-size: 50px;
        margin-bottom: 15px;
    }


    .feature-card h4 {
        color: #d63384;
        font-weight: 700;
    }


    .feature-card p {
        color: #777;
    }

</style>

@endsection