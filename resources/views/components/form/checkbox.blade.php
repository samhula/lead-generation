@props([
    'label',
    'description' => null,
    'id' => 'checkbox-' . uniqid(),
])

<div class="relative flex items-start py-2">
    <div class="flex h-6 items-center">
        <input 
            id="{{ $id }}" 
            type="checkbox" 
            @if($description) aria-describedby="{{ $id }}-description" @endif
            {{ $attributes->merge(['class' => 'h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 cursor-pointer']) }}
        >
    </div>

    <div class="ml-3 text-sm leading-6">
        <label for="{{ $id }}" class="font-medium text-gray-900 cursor-pointer">
            {{ $label }}
        </label>
        
        @if($description)
            <p id="{{ $id }}-description" class="text-gray-500">
                {{ $description }}
            </p>
        @endif
    </div>
</div>