@props([
    'title', 
    'time', 
    'type' => 'default'
])

@php
    $configs = [
        'call' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
            'color' => 'bg-blue-100 text-blue-600 ring-blue-50',
        ],
        'email' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
            'color' => 'bg-purple-100 text-purple-600 ring-purple-50',
        ],
        'meeting' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
            'color' => 'bg-orange-100 text-orange-600 ring-orange-50',
        ],
        'success' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
            'color' => 'bg-green-100 text-green-600 ring-green-50',
        ],
        'lead' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>',
            'color' => 'bg-gray-100 text-gray-600 ring-gray-50',
        ],
        'default' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
            'color' => 'bg-gray-100 text-gray-600 ring-gray-50',
        ]
    ];

    $style = $configs[$type] ?? $configs['default'];
@endphp

<li class="relative flex gap-x-4 pb-8 group">
    
    <div class="relative flex-none h-10 w-10 flex items-center justify-center">
        
        <div class="absolute top-10 left-1/2 -translate-x-1/2 w-0.5 h-full bg-gray-200 [.group:last-child_&]:hidden"></div>
        
        <div class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white ring-4 {{ $style['color'] }}">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $style['icon'] !!}
            </svg>
        </div>
    </div>

    <div class="flex-auto py-0.5">
        <div class="flex justify-between items-start gap-2">
            <p class="text-sm font-semibold text-gray-900 hover:text-blue-600 transition-colors cursor-pointer">
                {{ $title }}
            </p>
            <span class="text-xs text-gray-400 whitespace-nowrap pt-0.5">
                {{ $time }}
            </span>
        </div>
        
        </div>
</li>