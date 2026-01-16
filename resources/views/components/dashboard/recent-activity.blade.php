<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 h-full flex flex-col">
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-bold text-lg text-gray-900">Recent Activity</h2>
        <button class="text-sm text-blue-600 hover:text-blue-700 font-medium">View All</button>
    </div>

    <div class="flex-1 overflow-y-auto pr-2 custom-scrollbar">
        <ul role="list" class="">
            {{ $slot }}
        </ul>
    </div>
</div>