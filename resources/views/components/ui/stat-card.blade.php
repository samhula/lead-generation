@props([
    'label', 
    'value', 
    'sub_value' => null, // e.g. "/20"
    'icon', 
    'color' => 'blue' // blue, green, yellow, red
])

@php
    $colours = [
        'blue' => 'bg-blue-50 text-blue-600',
        'green' => 'bg-green-50 text-green-600',
        'yellow' => 'bg-yellow-50 text-yellow-600',
        'red' => 'bg-red-50 text-red-600',
    ];
    $icon_class = $colours[$color] ?? $colours['blue'];
@endphp

<div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">
    <div>
        <p class="text-sm font-medium text-gray-500">{{ $label }}</p>
        <p class="text-2xl font-bold text-gray-900 mt-1">
            {{ $value }}
            @if($sub_value)
                <span class="text-gray-400 text-lg font-normal">{{ $sub_value }}</span>
            @endif
        </p>
    </div>
    <div class="h-10 w-10 rounded-lg flex items-center justify-center {{ $icon_class }}">
        @if($icon === 'users')
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        @elseif($icon === 'status-online')
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
        @elseif($icon === 'mail')
             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        @endif
    </div>
</div>