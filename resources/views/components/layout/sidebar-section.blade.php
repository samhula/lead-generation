@props(['title'])

<div class="space-y-1">
    @if($title)
        <h3 class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 mt-2">
            {{ $title }}
        </h3>
    @endif
    
    <div class="space-y-0.5">
        {{ $slot }}
    </div>
</div>