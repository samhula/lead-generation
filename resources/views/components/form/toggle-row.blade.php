@props([
    'label',
    'description' => null,
    'id' => 'toggle-' . uniqid(), // Fallback ID if none provided
])

<div class="flex items-start justify-between py-4">
    <div class="flex-grow flex flex-col mr-4">
        <label for="{{ $id }}" class="text-sm font-medium text-gray-900 cursor-pointer">
            {{ $label }}
        </label>
        
        @if($description)
            <p class="text-sm text-gray-500 mt-1" id="{{ $id }}-description">
                {{ $description }}
            </p>
        @endif
    </div>

    <div class="relative inline-flex items-center cursor-pointer">
        <input 
            type="checkbox" 
            id="{{ $id }}" 
            class="sr-only peer"
            aria-describedby="{{ $description ? $id . '-description' : '' }}"
            {{ $attributes }}
        >
        
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600 transition-colors duration-200 ease-in-out"></div>
        
        </div>
</div>