@props([
    'src',
    'alt' => 'CRM Lite dashboard preview'
])

<div class="relative rounded-2xl bg-gray-50 p-1 shadow-xl">
    <div class="rounded-2xl overflow-hidden bg-white">
        <img
            src="{{ asset($src) }}"
            alt="{{ $alt }}"
            class="w-full h-auto block"
            loading="lazy"
        >
    </div>
</div>
