@props([
    'label',
    'icon' => null,
    'iconImage' => null,
    'href' => '#',
    'active' => false
])

<!-- SIDEBAR NAV ITEM START -->
<a href="{{ $href }}"
   class="flex items-center gap-3 px-4 py-2 rounded-xl transition-all
       {{ $active
           ? 'bg-blue-500/10 text-blue-600 font-semibold'
           : 'font-semibold text-gray-800 hover:bg-gray-200'
       }}"
>
    @if ($iconImage)
        <img
            src="{{ $iconImage }}"
            alt=""
            class="w-6.5 h-6.5 object-contain"
        />
    @elseif ($icon)
        <span class="text-lg">{{ $icon }}</span>
    @endif

    <span>{{ $label }}</span>
</a>
<!-- SIDEBAR NAV ITEM END -->
 