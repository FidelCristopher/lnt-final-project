<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f7fafc;
            color: #2d3748;
        }
        a {
            color: #3182ce;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Container */
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Card */
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
            padding: 1.5rem 2rem;
        }
        .card-header {
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 1rem;
        }
        .card-header h4 {
            margin: 0;
            font-weight: 600;
            color: #1a202c;
        }
        .card-body p {
            margin: 0.5rem 0;
            font-size: 1rem;
        }

        /* Button */
        .btn-primary {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #3182ce;
            color: white;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }
        .btn-primary:hover {
            background-color: #2c5282;
        }
    </style>

</head>
<body>
    @include('layouts.navigation')

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
