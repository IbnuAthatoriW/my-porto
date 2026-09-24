<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Personal portfolio — Informatics Student & Web Developer. Modern, professional portfolio showcasing projects, skills, and experience.">
    <meta name="author" content="Your Name">

    <title>{{ config('app.name', 'Portfolio') }} — Developer Portfolio</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('components.navbar')

    <main>
        @include('components.hero')
        @include('components.about')
        @include('components.skills')
        @include('components.projects')
        @include('components.experience')
        @include('components.stats')
        @include('components.contact')
    </main>

    @include('components.footer')
</body>
</html>
