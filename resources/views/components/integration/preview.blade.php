@props(['title'])

<div class="bg-gray-50 rounded-xl p-6 border">
    <h3 class="text-sm font-semibold mb-3">{{ $title }}</h3>

    <div class="bg-white rounded-lg p-4 text-sm text-gray-700 shadow-sm">
        {{ $slot }}
    </div>
</div>
