@props([
    'label',
    'options' => [],
    'selected' => null,
    'helper' => null,
    'id' => 'select-' . uniqid(),
])

<div class="space-y-1">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
    </label>

    <div class="relative">
        <select 
            id="{{ $id }}" 
            {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 bg-white py-2 pl-3 pr-10 text-base shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm hover:border-gray-400 transition-colors cursor-pointer']) }}
        >
            @foreach($options as $value => $text)
                @php
                    // Logic to handle simple vs associative arrays
                    $optionValue = is_string($value) || $attributes->get('assoc') ? $value : $text;
                    $isSelected = $selected == $optionValue;
                @endphp
                
                <option value="{{ $optionValue }}" @if($isSelected) selected @endif>
                    {{ $text }}
                </option>
            @endforeach
        </select>
    </div>

    @if($helper)
        <p class="text-sm text-gray-500" id="{{ $id }}-description">
            {{ $helper }}
        </p>
    @endif
</div>