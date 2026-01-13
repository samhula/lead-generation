@props(['title'])

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'CRM Lite Dashboard' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800 h-screen flex flex-col lg:flex-row overflow-hidden">

    <div class="lg:hidden flex-shrink-0 flex items-center justify-between p-4 bg-white border-b border-gray-200">
        <span class="font-bold text-gray-700">CRM Lite</span>
        <button id="mobile-menu-open" class="p-2 text-gray-600 hover:bg-gray-100 rounded-md focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <x-layout.sidebar />
    
    <main class="flex-1 h-full p-6 overflow-y-auto space-y-6">
        {{ $slot }}
    </main>

    <x-layout.global-search />
    
    @vite(['resources/js/app.js'])
</body>
</html>