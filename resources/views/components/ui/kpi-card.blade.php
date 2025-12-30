@props(['label', 'icon', 'value'])

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
    <div class="flex items-center justify-between">
        <p class="font-semibold text-gray-600">{{ $label }}</p>
        <span class="text-xl">{{ $icon }}</span>
    </div>
    <p class="text-3xl font-bold mt-3">{{ $value }}</p>
</div>
