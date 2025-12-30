{{-- Global Search Overlay --}}
<div
    id="global-search-overlay"
    class="fixed inset-0 z-50 hidden"
>
    {{-- Backdrop --}}
    <div
        id="global-search-backdrop"
        class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-200"
    ></div>

    {{-- Modal --}}
    <div class="relative flex justify-center pt-28">
        <div
            id="global-search-modal"
            class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl
                   opacity-0 scale-95 translate-y-2
                   transition-all duration-200 ease-out"
        >
            {{-- Input --}}
            <div class="border-b px-5 py-4">
                <input
                    id="global-search-input"
                    type="text"
                    placeholder="Search contacts, deals, companies…"
                    class="w-full text-lg outline-none placeholder-gray-400"
                />
            </div>

            {{-- Example results --}}
            <div class="max-h-96 overflow-y-auto">
                <div class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">
                    Contacts
                </div>

                <button class="w-full px-5 py-3 text-left hover:bg-gray-50">
                    <div class="font-medium">Jane Doe</div>
                    <div class="text-sm text-gray-500">Acme Corp</div>
                </button>

                <div class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">
                    Deals
                </div>

                <button class="w-full px-5 py-3 text-left hover:bg-gray-50">
                    <div class="font-medium">Website Redesign</div>
                    <div class="text-sm text-gray-500">$12,000 • Qualified</div>
                </button>
            </div>
        </div>
    </div>
</div>
