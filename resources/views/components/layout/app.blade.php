@props(['title'])

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'CRM Lite Dashboard' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800 h-screen flex">
    <x-layout.sidebar />
    
    <main class="flex-1 p-6 overflow-y-auto space-y-6">
        {{ $slot }}
    </main>
    <x-layout.global-search />
    @vite(['resources/js/app.js'])
</body>
</html>