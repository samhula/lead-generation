@props(['title', 'colour'])

<!-- PIPELINE COLUNN START -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
    <div class="font-semibold text-center mb-3 {{ $colour }}">
        {{ $title }}
    </div>
    {{ $slot }}
</div>
<!-- PIPELINE COLUMN END -->