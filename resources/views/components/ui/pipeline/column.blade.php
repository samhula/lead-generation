@props([
    'title', 
    'count' => 0, 
    'total' => '$0',
    'color' => 'blue'
])

@php
    $colors = [
        'blue'   => 'border-t-blue-500',
        'purple' => 'border-t-purple-500',
        'yellow' => 'border-t-yellow-400',
        'orange' => 'border-t-orange-500',
        'green'  => 'border-t-green-500',
    ];
    // Default to gray if color not found
    $borderClass = $colors[$color] ?? 'border-t-gray-400';
@endphp

<div class="flex flex-col bg-gray-50/50 rounded-xl border border-gray-200 border-t-[3px] {{ $borderClass }} h-full min-h-[150px]">
    
    <div class="p-3 border-b border-gray-100/50">
        <div class="flex items-center justify-between mb-1">
            <h3 class="font-semibold text-gray-700 text-xs uppercase tracking-wider">{{ $title }}</h3>
            <span class="text-[10px] font-bold text-gray-500 bg-white px-1.5 py-0.5 rounded border border-gray-200 shadow-sm">{{ $count }}</span>
        </div>
        <div class="text-xs text-gray-400 font-medium ml-0.5">
            {{ $total }}
        </div>
    </div>

    <div class="p-2 space-y-2 flex-1">
        @if($count > 0)
            {{ $slot }}
        @else
            <div class="h-full min-h-[60px] border-2 border-dashed border-gray-200 rounded-lg flex items-center justify-center">
                <span class="text-xs text-gray-300 font-medium">Empty</span>
            </div>
        @endif
    </div>
</div>