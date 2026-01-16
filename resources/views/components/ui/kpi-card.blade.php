@props([
    'label', 
    'value', 
    'trend' => null, 
    'color' => 'blue'
])

@php
    // Color definitions for the Icon Background
    $themes = [
        'blue'   => 'bg-blue-50 text-blue-600',
        'purple' => 'bg-purple-50 text-purple-600',
        'yellow' => 'bg-yellow-50 text-yellow-600',
        'green'  => 'bg-green-50 text-green-600',
        'red'    => 'bg-red-50 text-red-600',
    ];
    $themeClass = $themes[$color] ?? $themes['blue'];

    // Trend Logic (Green for up, Red for down)
    $isNegative = str_contains($trend, '-');
    $trendColor = $isNegative ? 'text-red-600 bg-red-50' : 'text-green-600 bg-green-50';
    $trendIcon  = $isNegative 
        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />' 
        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />';
@endphp

<div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-shadow duration-200">
    <div class="flex items-start justify-between">
        
        <div class="flex flex-col gap-1">
            <span class="text-sm font-medium text-gray-500 tracking-wide">{{ $label }}</span>
            
            <div class="flex items-baseline gap-3 mt-1">
                <span class="text-3xl font-bold text-gray-900 tracking-tight">
                    {{ $value }}
                </span>
            </div>
        </div>

        <div class="p-2.5 rounded-xl {{ $themeClass }} shrink-0">
            {{ $slot }}
        </div>
    </div>

    @if($trend)
    <div class="mt-4 flex items-center gap-2">
        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-semibold {{ $trendColor }}">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $trendIcon !!}
            </svg>
            {{ $trend }}
        </span>
        <span class="text-xs text-gray-400 font-medium">vs last month</span>
    </div>
    @endif
</div>