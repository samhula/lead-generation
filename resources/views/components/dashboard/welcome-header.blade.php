@props(['name' => 'Name','showAddDeal' => false])

<section class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl md:text-3xl font-semibold tracking-tight text-gray-900">
            Welcome back, {{ $name }} 👋
        </h1>
        <p class="mt-1 text-sm md:text-base text-gray-500">
            Here’s a quick overview of your sales performance today.
        </p>
    </div>

    <div class="flex items-center gap-3">
        <button
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200
                   bg-white/80 backdrop-blur-md text-sm font-medium text-gray-700 
                   shadow-sm say hover:bg-gray-200 transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
            </svg>

            Import Contacts
        </button>

        @if($showAddDeal)
            <!-- Add First Deal -->
            <a href=""
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                      bg-gradient-to-br from-blue-500 to-blue-600
                      text-sm font-semibold text-white shadow-md
                      hover:from-blue-600 hover:to-blue-700 transition"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add First Deal
            </a>
        @endif
    </div>
</section>
