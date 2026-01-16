@props([
    'src',
    'alt' => 'CRM Lite dashboard preview'
])

<div class="relative rounded-b-xl bg-gray-50 shadow-xl">
    <div class="overflow-hidden bg-white">
        <img
            src="{{ asset($src) }}"
            alt="{{ $alt }}"
            class="w-full h-auto block"
            loading="lazy"
        >
    </div>
</div>
