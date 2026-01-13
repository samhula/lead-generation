@props([
    'number',
    'title'
])

<div class="text-center max-w-sm mx-auto">
    <div class="mx-auto mb-4 flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-bold">
        {{ $number }}
    </div>

    <h3 class="font-semibold mb-2">
        {{ $title }}
    </h3>

    <p class="text-gray-600 text-sm leading-relaxed">
        {{ $slot }}
    </p>
</div>
