@props([
    'title',
    'description',
    'icon'
])

<div class="p-6 rounded-xl bg-white shadow-sm hover:shadow-md transition">
    <div class="text-3xl mb-4">
        {{ $icon }}
    </div>

    <h3 class="font-semibold text-lg mb-2">
        {{ $title }}
    </h3>

    <p class="text-gray-600 text-sm leading-relaxed">
        {{ $description }}
    </p>
</div>
