@props([
    'variant' => 'primary', // Options: primary, outline, danger, ghost
    'size' => 'md',         // Options: sm, md, lg
    'href' => null,         // If provided, renders as <a> tag
])

@php
    // Base classes (Transition, Focus, Alignment, Disabled states)
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed';

    // Variants (Colors & Borders)
    // Note: 'primary' uses the Discord Blurple (#5865F2) to match your layout
    $variants = [
        'primary' => 'bg-[#5865F2] hover:bg-[#4752C4] text-white border border-transparent focus:ring-indigo-500 shadow-sm',
        'outline' => 'bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 focus:ring-indigo-500 shadow-sm',
        'danger'  => 'bg-red-600 hover:bg-red-700 text-white border border-transparent focus:ring-red-500 shadow-sm',
        'ghost'   => 'bg-transparent hover:bg-gray-100 text-gray-600 hover:text-gray-900 border border-transparent focus:ring-gray-500',
    ];

    // Sizes (Padding & Text Size)
    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    // Combine classes
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes, 'type' => 'button']) }}>
        {{ $slot }}
    </button>
@endif