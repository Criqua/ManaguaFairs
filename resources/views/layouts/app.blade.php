<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Nicaragua, Managua, Barrios, Ferias, Emprendedores">
    <meta name="description"
        content="ManaguaFairs es una pequeña plataforma que conecta a los emprendedores de Managua con los barrios y ferias de la ciudad.">
    <meta name="author" content="Cristian Gago, Manuel López y María Aguilar">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ManaguaFairs') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=lora:400&display=swap" rel="stylesheet"/>

    <!-- Tailwind + Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Kit de Íconos de Font Awesome -->
    <script defer src="https://kit.fontawesome.com/2af02d949f.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-100 dark:bg-gray-900">

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>