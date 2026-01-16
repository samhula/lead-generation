@props([
    'label',
    'href' => '#',
    'active' => false,
    'icon' => null,       // For Emojis
    'icon_image' => null,  // For Images (Slack/WhatsApp)
    'badge' => null       // For numbers
])

<a href="{{ $href }}"
   class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200
       {{ $active
           ? 'bg-blue-50 text-blue-700'
           : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'
       }}"
>
    <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center text-lg leading-none">
        @if ($icon_image)
            <img src="{{ $icon_image }}" alt="" class="w-5 h-5 object-contain">
        @elseif ($icon)
            {{ $icon }}
        @endif
    </div>

    <span class="flex-1 text-sm font-medium pt-0.5">{{ $label }}</span>

    @if($badge)
        <span class="bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs font-semibold group-hover:bg-white border border-transparent group-hover:border-gray-200">
            {{ $badge }}
        </span>
    @endif
</a>