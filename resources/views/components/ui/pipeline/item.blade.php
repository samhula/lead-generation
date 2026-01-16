@props(['title', 'value', 'company' => 'Acme Corp'])

<div 
    draggable="true"
    ondragstart="handleDragStart(event)"
    ondragend="handleDragEnd(event)"
    {{ $attributes->merge(['class' => 'group relative bg-white p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-blue-300 hover:-translate-y-0.5 transition-all duration-200 cursor-grab active:cursor-grabbing select-none']) }}
>
    <div class="flex justify-between items-start mb-1">
        <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider truncate max-w-[70%]">
            {{ $company }}
        </span>
        <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
    </div>

    <p class="text-sm font-semibold text-gray-800 leading-snug mb-3 group-hover:text-blue-600 transition-colors">
        {{ $title }}
    </p>

    <div class="flex items-center justify-between border-t border-gray-50 pt-2.5 mt-1">
        <span class="inline-flex items-center gap-1 text-sm font-semibold text-gray-900">
            {{ is_numeric($value) ? '$' . number_format($value) : $value }}
        </span>
        
        <span class="text-[10px] text-gray-400 bg-gray-50 px-1.5 py-0.5 rounded border border-gray-100">
            2d
        </span>
    </div>
</div>