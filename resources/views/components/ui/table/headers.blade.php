@props([
    'title', 
    'description', 
    'buttonText',        
    'buttonIcon' => null 
])

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
        <p class="text-sm text-gray-500 mt-1">{{ $description }}</p>
    </div>

    <button class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-all">
        
        @if($buttonIcon === 'plus')
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        @endif

        {{ $buttonText }}
    </button>
</div>