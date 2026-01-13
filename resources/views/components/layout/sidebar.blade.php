<div id="sidebar-backdrop" class="fixed inset-0 z-40 bg-gray-900/40 backdrop-blur-sm hidden transition-opacity opacity-0 lg:hidden"></div>

<aside 
    id="sidebar-panel"
    class="
        fixed inset-y-0 left-0 z-50 w-72 flex flex-col
        bg-white/95 backdrop-blur-xl border-r border-white/20
        transform -translate-x-full transition-transform duration-300 ease-in-out
        
        lg:translate-x-0 lg:static lg:inset-auto lg:border-r-0
        lg:m-4 lg:rounded-2xl lg:min-h-[90vh]
        lg:bg-gradient-to-b lg:from-white/80 lg:to-white/60 
        lg:shadow-xl
    "
>
    <div class="flex justify-end p-2 lg:hidden">
        <button id="mobile-menu-close" class="p-2 text-gray-500 hover:text-gray-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <div class="flex-shrink-0">
        <x-layout.sidebar-header />
    </div>

    <div class="flex-1 overflow-y-auto no-scrollbar">
        <x-layout.sidebar-nav />
    </div>

    <div class="flex-shrink-0">
        <x-layout.sidebar-footer />
    </div>

    </aside>

@vite(['resources/js/sidebar.js'])