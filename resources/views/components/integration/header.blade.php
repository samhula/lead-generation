@props([
    'title',
    'description',
    'logo',
    'connected' => false,
    'connectedAs' => null,
])

<div class="flex items-start gap-4">
    <img src="{{ $logo }}" alt="{{ $title }}" class="w-10 h-10">

    <div class="flex-1">
        <h1 class="text-2xl font-bold">{{ $title }}</h1>
        <p class="text-gray-600 mt-1">{{ $description }}</p>

        <div class="mt-3">
            @if($connected)
                <span class="inline-flex items-center gap-2 text-sm text-green-600 font-medium">
                    ● Connected{{ $connectedAs ? ' to ' . $connectedAs : '' }}
                </span>
            @else
                <span class="text-sm text-gray-500">
                    Not connected
                </span>
            @endif
        </div>
    </div>
</div>
