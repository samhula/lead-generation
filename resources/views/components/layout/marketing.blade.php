<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRM Lite</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 antialiased">

    <!-- Top Nav -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur">
    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

        <!-- Brand -->
        <a href="/" class="flex items-center gap-2 font-semibold text-lg">
            <span class="w-8 h-8 rounded-lg bg-blue-600"></span>
            <span>CRM Lite</span>
        </a>

        <!-- Nav -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="#how-it-works" class="text-gray-600 hover:text-gray-900 transition">
                How it works
            </a>

            <a href="#pricing" class="text-gray-600 hover:text-gray-900 transition">
                Pricing
            </a>

            <a
                href="#"
                class="text-gray-600 hover:text-gray-900 transition"
            >
                Sign in
            </a>

            <x-ui.button href="#" size="sm">
                Get Early Access
            </x-ui.button>
        </nav>

    </div>
</header>


    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t py-8 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-sm text-gray-500 flex justify-between">
            <span>© {{ date('Y') }} CRM Lite</span>
            <span>Built for solopreneurs and small teams</span>
        </div>
    </footer>

</body>
</html>
