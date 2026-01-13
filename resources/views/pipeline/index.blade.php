<x-layout.app>
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Pipeline</h1>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500 mr-2">Total Pipeline: <span class="font-semibold text-gray-900">$45,200</span></span>
            <button class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-all">
                New Deal
            </button>
        </div>
    </div>

    <section class="h-[calc(100vh-10rem)] min-h-[500px] overflow-x-auto pb-6">
        <div class="inline-flex h-full items-start px-1">

            @php
                $stages = [
                    'New'       => 'bg-blue-500',
                    'Contacted' => 'bg-yellow-400',
                    'Qualified' => 'bg-indigo-500',
                    'Proposal'  => 'bg-purple-500',
                    'Won'       => 'bg-emerald-500',
                ];

                $leads = [
                    ['id' => 1, 'stage' => 'New',       'title' => 'Website Redesign', 'company' => 'Acme Corp', 'value' => 5000, 'date' => '2d'],
                    ['id' => 2, 'stage' => 'New',       'title' => 'Consultation',     'company' => 'Stark Ind', 'value' => 1200, 'date' => '5h'],
                    ['id' => 3, 'stage' => 'Contacted', 'title' => 'Q4 Marketing',     'company' => 'Wayne Ent', 'value' => 15000, 'date' => '1d'],
                    ['id' => 4, 'stage' => 'Qualified', 'title' => 'SaaS License',     'company' => 'Cyberdyne', 'value' => 8500, 'date' => '3d'],
                    ['id' => 5, 'stage' => 'Proposal',  'title' => 'Annual Contract',  'company' => 'Massive',   'value' => 22000, 'date' => '1w'],
                ];
            @endphp

            @foreach($stages as $stageName => $dotColor)
                @php
                    $columnLeads = collect($leads)->where('stage', $stageName);
                @endphp

                <div class="flex h-full w-80 shrink-0 flex-col group/column border-r border-dashed border-gray-200 last:border-0 px-4">
                    
                    <div class="flex items-center justify-between mb-3 pt-2">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full {{ $dotColor }}"></span>
                            <h3 class="font-bold text-gray-900 text-sm tracking-wide">{{ $stageName }}</h3>
                            <span class="text-gray-400 text-xs font-medium ml-1 bg-gray-100 px-1.5 py-0.5 rounded-md">{{ $columnLeads->count() }}</span>
                        </div>
                        <button class="text-gray-300 hover:text-gray-600 opacity-0 group-hover/column:opacity-100 transition-opacity">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </button>
                    </div>

                    <div 
                        class="flex-1 overflow-y-auto pb-4 space-y-3 custom-scrollbar"
                        data-stage="{{ $stageName }}"
                        ondrop="drop(event)" 
                        ondragover="allowDrop(event)"
                    >
                        @foreach($columnLeads as $lead)
                            <div 
                                id="lead-{{ $lead['id'] }}"
                                draggable="true" 
                                ondragstart="drag(event)"
                                ondragend="dragEnd(event)"
                                class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm cursor-grab hover:shadow-md hover:border-blue-300 transition-all active:cursor-grabbing group/card"
                            >
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-semibold text-gray-800 leading-tight group-hover/card:text-blue-600 transition-colors">
                                        {{ $lead['title'] }}
                                    </span>
                                    <span class="text-xs text-gray-500">
                                        {{ $lead['company'] }}
                                    </span>
                                    
                                    <div class="h-3 border-b border-gray-50 mb-2"></div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-bold text-gray-900">
                                            ${{ number_format($lead['value']) }}
                                        </span>
                                        <span class="text-[10px] text-gray-400">
                                            {{ $lead['date'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="spacer-card h-24 rounded-lg border-2 border-dashed border-gray-100 hidden group-hover/column:block"></div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <script>
        let draggedItem = null;

        function drag(ev) {
            draggedItem = ev.target;
            ev.dataTransfer.effectAllowed = "move";
            
            // Use a tiny timeout so the "ghost image" the browser grabs is opaque,
            // but the actual element on screen becomes semi-transparent/dashed.
            setTimeout(() => {
                ev.target.classList.add('dragging');
            }, 0);
        }

        function dragEnd(ev) {
            // Remove the class to restore opacity and pointer-events
            ev.target.classList.remove('dragging');
            draggedItem = null;
        }

        function allowDrop(ev) {
            ev.preventDefault();
            
            // Safety check: if we aren't dragging anything, stop (fixes hover bugs)
            if (!draggedItem) return;

            const container = ev.target.closest('[data-stage]');
            if (!container) return;

            // 1. Calculate where to place the element
            const afterElement = getDragAfterElement(container, ev.clientY);
            
            // 2. Live Sorting
            // "spacer" is the invisible dashed box at the bottom. We never want to go below it.
            const spacer = container.querySelector('.spacer-card'); 

            if (afterElement == null) {
                // If we are at the bottom of the list, insert BEFORE the spacer
                // If no spacer exists, appendChild works as normal
                if(spacer) {
                    container.insertBefore(draggedItem, spacer);
                } else {
                    container.appendChild(draggedItem);
                }
            } else {
                // If we are above another card, insert before it
                container.insertBefore(draggedItem, afterElement);
            }
        }

        function drop(ev) {
            ev.preventDefault();
            const dropZone = ev.target.closest('[data-stage]');
            
            if (dropZone && draggedItem) {
                // Trigger Backend Update
                const newStage = dropZone.getAttribute('data-stage');
                const leadId = draggedItem.id.replace('lead-', '');
                
                // Calculate Index: filter out the spacer/ghost so it doesn't mess up count
                const draggableChildren = Array.from(dropZone.children).filter(c => c.hasAttribute('draggable'));
                const newIndex = draggableChildren.indexOf(draggedItem);
                
                console.log(`Moved Deal ${leadId} to ${newStage} at position ${newIndex}`);
            }
        }

        function getDragAfterElement(container, y) {
            // Select all draggable elements that are NOT the one currently being dragged
            const draggableElements = [...container.querySelectorAll('[draggable="true"]:not(.dragging)')];

            return draggableElements.reduce((closest, child) => {
                const box = child.getBoundingClientRect();
                const offset = y - (box.top + box.height / 2);

                // We look for the element whose center is immediately BELOW the cursor
                if (offset < 0 && offset > closest.offset) {
                    return { offset: offset, element: child };
                } else {
                    return closest;
                }
            }, { offset: Number.NEGATIVE_INFINITY }).element;
        }
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 0px; background: transparent; }
    </style>
</x-layout.app>