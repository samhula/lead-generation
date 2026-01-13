@props([
    'href' => null,
    'variant' => 'primary',
    'size' => 'md'
])

@php
$base = 'inline-flex items-center justify-center font-semibold rounded-lg transition focus:outline-none';

$sizes = [
    'sm' => 'px-4 py-2 text-sm',
    'md' => 'px-6 py-3 text-sm',
];

$variants = [
    'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
    'light' => 'bg-white text-blue-600 hover:bg-gray-100',
    'danger'  => 'bg-red-600 text-white hover:bg-red-700',
];

$classes = "$base {$sizes[$size]} {$variants[$variant]}";
@endphp

@if($href)
    <a href="{{ $href }}" class="{{ $classes }}">
        {{ $slot }}
    </a>
@else
    <button class="{{ $classes }}">
        {{ $slot }}
    </button>
@endif
