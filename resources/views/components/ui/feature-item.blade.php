@props(['icon'])

<div {{ $attributes->merge(['class' => 'flex gap-4']) }}>
    <div class="text-2xl">
        {{ $icon }}
    </div>

    <div class="text-gray-700 text-sm leading-relaxed">
        {{ $slot }}
    </div>
</div>
