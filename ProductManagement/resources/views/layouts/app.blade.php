<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    /* Active link styling */
    .active-link {
        color: black; /* Darker for active links */
        border-bottom-color: #4F46E5; /* Underline for active links */
    }

    /* Navigation links spacing */
    .ml-8 {
        margin-left: 0.9rem; /* Space between logo and navigation links */
    }

    /* Right-side dropdown alignment */
     .ml-auto {
        margin-left: auto; /* Push right-side dropdown to the far right */
    }

     /* General link styles */
        nav a {
        color: black !important;
        font-size: 1.5rem; /* Larger font size for better visibility */
        text-decoration: none; /* Remove underline */
        
    }

    nav a:hover {
    color: gray !important; /* Change text color to GRAY on hover */
}


</style>



    <!-- Vite Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow mb-4">
            <div class="container py-4">
                <h1 class="h4">{{ $header }}</h1>
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="flex-grow-1">
        <div class="container my-4">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-white text-center py-3" style="background: linear-gradient(to right, rgb(33, 36, 41), rgb(41, 62, 132), rgb(33, 36, 41));">
        <p class="mb-0">&copy; {{ date('Y') }} - {{ config('app.name', 'Laravel') }}. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
