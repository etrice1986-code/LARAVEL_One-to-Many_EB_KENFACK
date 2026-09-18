<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'MyBlog' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

    {{-- HEADER --}}
    <x-header />

    {{-- CONTENUTO PRINCIPALE --}}
    <main class="py-4">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    {{-- FOOTER --}}
    <x-footer />

</body>
</html>
