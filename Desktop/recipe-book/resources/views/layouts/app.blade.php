<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Recipe Book')</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff5e6, #ffe0ec);
            min-height: 100vh;
        }

        /* NAVBAR */

        .navbar {
            background: linear-gradient(135deg, #ff7a18, #ff4b8b);
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 1.4rem;
            color: white !important;
        }

        .nav-btn {
            color: white !important;
            padding: 8px 14px !important;
            border-radius: 10px;
            transition: 0.3s;
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* MAIN */

        .main-container {
            padding-top: 40px;
            padding-bottom: 60px;
        }

        /* CARDS */

        .recipe-card {
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
        }

        .recipe-card:hover {
            transform: translateY(-5px);
        }

        /* FOOTER */

        .footer {
            text-align: center;
            padding: 25px;
            background: white;
            color: #777;
        }

    </style>

</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-dark">

        <div class="container">

            <!-- Logo -->

            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                🍴 Recipe Book
            </a>


            <!-- Mobile Menu Button -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Navigation -->

            <div
                class="collapse navbar-collapse"
                id="navbarMenu"
            >

                <ul class="navbar-nav ms-auto align-items-lg-center gap-2">

                    <li class="nav-item">

                        <a
                            class="nav-link nav-btn"
                            href="{{ url('/') }}"
                        >
                            🏠 Home
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link nav-btn"
                            href="{{ route('recipes.index') }}"
                        >
                            🍽️ Recipes
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link nav-btn"
                            href="{{ route('recipes.create') }}"
                        >
                            ➕ Add Recipe
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link nav-btn"
                            href="{{ route('meal-plans.index') }}"
                        >
                            📅 Meal Planner
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link nav-btn"
                            href="{{ route('meal-plans.create') }}"
                        >
                            📝 Plan Meal
                        </a>

                    </li>

                    <li class="nav-item">

    <a
        class="nav-link nav-btn"
        href="{{ route('shopping-list.index') }}"
    >
        🛒 Shopping List
    </a>

</li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- MAIN CONTENT -->

    <main class="container main-container">

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif


        @yield('content')

    </main>


    <!-- FOOTER -->

    <footer class="footer">

        🍴 Made with Laravel & ❤️

    </footer>


    <!-- Bootstrap JavaScript -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>