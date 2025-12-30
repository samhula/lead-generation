<x-layout.app>

    <!-- PAGE HEADER -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Sales Pipeline</h1>
    </div>

    <!-- PIPELINE -->
    <section class="mt-8">
        <div id="pipeline" class="grid grid-cols-1 md:grid-cols-5 gap-6">

            @php
                $stages = [
                    'New' => 'text-blue-600',
                    'Contacted' => 'text-yellow-600',
                    'Qualified' => 'text-teal-600',
                    'Proposal' => 'text-purple-600',
                    'Won/Lost' => 'text-green-600',
                ];

                $leads = [
                    ['stage' => 'New', 'name' => 'Lead A'],
                    ['stage' => 'New', 'name' => 'Lead A'],
                    ['stage' => 'Contacted', 'name' => 'Lead B'],
                    ['stage' => 'Qualified', 'name' => 'Lead C'],
                    ['stage' => 'Proposal', 'name' => 'Lead D'],
                    ['stage' => 'Won/Lost', 'name' => 'Lead E'],
                ];
            @endphp

            @foreach($stages as $stage => $colour)
                <div class="kanban-col bg-white rounded-xl shadow p-4 flex flex-col min-h-[360px]">

                    <!-- Column Header -->
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold {{ $colour }}">{{ $stage }}</h3>
                        <span class="text-xs text-gray-400">
                            {{ collect($leads)->where('stage', $stage)->count() }}
                        </span>
                    </div>

                    <!-- Cards -->
                    <div class="cards-container flex flex-col gap-2">
                        @foreach($leads as $lead)
                            @if($lead['stage'] === $stage)
                                <div
                                    class="lead-card bg-gray-50 border rounded-lg px-3 py-2 text-sm shadow-sm
                                        cursor-grab active:cursor-grabbing select-none"
                                >
                                    {{ $lead['name'] }}
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            @endforeach

        </div>
    </section>

    @vite(['resources/js/app.js', 'resources/js/draggable.js'])
</x-layout.app>
