<x-layout.app title="Pipeline - CRM Lite">
    
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pipeline</h1>
            <p class="text-sm text-gray-500 mt-1">Manage and track your active deal flow.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center rounded-md bg-white px-2.5 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-200 shadow-sm">
                Total Value: $45,200
            </span>
        </div>
    </div>

    <div class="mb-6 bg-white p-1.5 rounded-xl border border-gray-200 shadow-sm flex flex-col sm:flex-row items-center gap-2">
        
        <div class="relative flex-1 w-full sm:w-auto">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input 
                type="text" 
                id="searchInput"
                value="{{ $filters['search'] ?? '' }}"
                class="block w-full border-0 rounded-lg py-2 pl-10 pr-3 text-sm text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 bg-transparent sm:leading-6" 
                placeholder="Search deals..."
                onkeydown="if(event.key === 'Enter') applyFilters()"
            >
        </div>

        <div class="hidden sm:block w-px h-6 bg-gray-200"></div>

        <div class="flex w-full sm:w-auto items-center gap-2">
            
            <div class="relative w-full sm:w-48">
                <select 
                    id="sortSelect"
                    onchange="applyFilters()"
                    class="block w-full rounded-lg border-0 py-2 pl-3 pr-8 text-sm text-gray-600 font-medium bg-gray-50 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 cursor-pointer transition-colors"
                >
                    <option value="date_desc" {{ ($filters['sort'] ?? '') == 'date_desc' ? 'selected' : '' }}>Newest First</option>
                    <option value="date_asc"  {{ ($filters['sort'] ?? '') == 'date_asc' ? 'selected' : '' }}>Oldest First</option>
                    <option value="value_desc" {{ ($filters['sort'] ?? '') == 'value_desc' ? 'selected' : '' }}>Value: High to Low</option>
                    <option value="value_asc"  {{ ($filters['sort'] ?? '') == 'value_asc' ? 'selected' : '' }}>Value: Low to High</option>
                </select>
                
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            @if(!empty($filters['search']) || ($filters['sort'] ?? 'date_desc') !== 'date_desc')
                <a href="{{ route('pipeline.index') }}" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Clear Filters">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </a>
            @endif

            <button class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-all">
                <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>New Deal</span>
            </button>
        </div>
    </div>

    <section id="board-container" class="h-[calc(100vh-14rem)] min-h-[500px] overflow-x-auto pb-4">
        <div class="inline-flex h-full items-start px-1 gap-6">

            @foreach($stages as $stageName => $dotColor)
                @php
                    $columnLeads = $pipeline_leads[$stageName];
                    $borderColor = match($dotColor) {
                        'bg-blue-500' => 'border-t-blue-500',
                        'bg-yellow-400' => 'border-t-yellow-400',
                        'bg-indigo-500' => 'border-t-indigo-500',
                        'bg-purple-500' => 'border-t-purple-500',
                        'bg-emerald-500' => 'border-t-emerald-500',
                        default => 'border-t-gray-300',
                    };
                @endphp

                <div class="flex h-full w-80 shrink-0 flex-col bg-gray-100/50 rounded-xl border border-gray-200 border-t-4 {{ $borderColor }} shadow-[0_2px_8px_rgba(0,0,0,0.04)] group/column">
                    
                    <div class="p-3 border-b border-gray-200/60 flex items-center justify-between bg-gray-50/50 rounded-t-lg">
                        <div class="flex items-center gap-2">
                            <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider">{{ $stageName }}</h3>
                            <span class="text-gray-500 text-[10px] font-bold bg-white border border-gray-200 px-2 py-0.5 rounded-full shadow-sm">
                                {{ count($columnLeads->items()) }}
                            </span>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </div>

                    <div 
                        class="flex-1 overflow-y-auto p-3 space-y-3 custom-scrollbar" 
                        data-stage="{{ $stageName }}"
                        data-next-cursor="{{ $columnLeads->nextCursor()?->encode() }}"
                        ondragover="handleDragOver(event)"
                        ondrop="handleDrop(event)"
                    >
                        @foreach($columnLeads->items() as $lead)
                            <x-ui.pipeline.item 
                                id="lead-{{ $lead->id }}"
                                :title="$lead->title" 
                                :value="$lead->value"
                                :company="$lead->company ?? 'Unknown'"
                            />
                        @endforeach

                        @if($columnLeads->hasMorePages())
                            <div class="loading-sentinel h-12 flex items-center justify-center">
                                <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        @if(empty($columnLeads->items()))
                            <div class="h-32 flex flex-col items-center justify-center text-gray-400 border-2 border-dashed border-gray-200 rounded-lg m-1">
                                <span class="text-xs font-medium">No deals</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .custom-scrollbar { overscroll-behavior-y: contain; -webkit-overflow-scrolling: touch; }
        
        /* FIX 1: Removed transform: scale(0.95) */
        .dragging { opacity: 0.5; background: #f8fafc; border: 2px dashed #94a3b8; box-shadow: none; pointer-events: none !important; }
        
        /* Improved indicator style */
        .drop-indicator { height: 3px; background: #3b82f6; margin: 4px 0; border-radius: 3px; pointer-events: none; }
        .drag-over-column { background-color: #eff6ff !important; border-color: #bfdbfe !important; }
        
        select { -webkit-appearance: none; -moz-appearance: none; appearance: none; }
    </style>

    <script>
        // FILTERS
        function applyFilters() {
            const search = document.getElementById('searchInput').value;
            const sort = document.getElementById('sortSelect').value;
            const params = new URLSearchParams(window.location.search);
            if(search) params.set('search', search); else params.delete('search');
            if(sort) params.set('sort', sort);
            window.location.search = params.toString();
        }

        // SCROLL & DRAG
        document.addEventListener('DOMContentLoaded', () => {
            const board = document.getElementById('board-container');
            if (board) {
                board.addEventListener('wheel', (evt) => {
                    if (evt.shiftKey) return;
                    const scrollableColumn = evt.target.closest('.custom-scrollbar');
                    if (scrollableColumn) return;
                    evt.preventDefault();
                    board.scrollLeft += evt.deltaY;
                }, { passive: false });
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(e => { if(e.isIntersecting) loadMore(e.target); });
            }, { rootMargin: '100px' });
            
            document.querySelectorAll('.loading-sentinel').forEach(el => observer.observe(el));

            async function loadMore(sentinel) {
                if(sentinel.classList.contains('loading')) return;
                const col = sentinel.closest('[data-stage]');
                const cursor = col.getAttribute('data-next-cursor');
                if(!cursor || cursor === 'null') return;

                sentinel.classList.add('loading');
                const params = new URLSearchParams(window.location.search);
                const stage = col.getAttribute('data-stage');
                const url = `{{ route("pipeline.load-more") }}?stage=${stage}&cursor=${cursor}&${params.toString()}`;

                try {
                    const res = await fetch(url, { headers: {'X-Requested-With': 'XMLHttpRequest'} });
                    const data = await res.json();
                    sentinel.insertAdjacentHTML('beforebegin', data.html);
                    if(data.next_cursor) {
                        col.setAttribute('data-next-cursor', data.next_cursor);
                        sentinel.classList.remove('loading');
                    } else {
                        sentinel.remove();
                        col.removeAttribute('data-next-cursor');
                    }
                } catch (err) { console.error(err); sentinel.classList.remove('loading'); }
            }
        });

        // DRAG AND DROP
        let draggedItem = null, currentIndicator = null;
        
        window.handleDragStart = (ev) => { draggedItem = ev.target; ev.dataTransfer.effectAllowed = "move"; requestAnimationFrame(() => draggedItem.classList.add('dragging')); };
        window.handleDragEnd = (ev) => { ev.target.classList.remove('dragging'); if(currentIndicator) currentIndicator.remove(); document.querySelectorAll('.drag-over-column').forEach(el => el.classList.remove('drag-over-column')); draggedItem = null; };
        
        window.handleDragOver = (ev) => {
            ev.preventDefault(); const col = ev.currentTarget;
            document.querySelectorAll('.drag-over-column').forEach(el => el.classList.remove('drag-over-column')); col.classList.add('drag-over-column');
            if(!currentIndicator) { currentIndicator = document.createElement('div'); currentIndicator.className = 'drop-indicator'; }
            const after = getAfterElement(col, ev.clientY);
            if(after) col.insertBefore(currentIndicator, after); else col.appendChild(currentIndicator);
        };
        
        window.handleDrop = (ev) => {
            ev.preventDefault(); const col = ev.currentTarget; col.classList.remove('drag-over-column');
            if(currentIndicator && currentIndicator.parentNode === col) col.insertBefore(draggedItem, currentIndicator); else col.appendChild(draggedItem);
            if(currentIndicator) currentIndicator.remove();
            
            const newStage = col.getAttribute('data-stage');
            const leadId = draggedItem.id.replace('lead-', '');
            
            fetch('{{ route("pipeline.move") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ lead_id: leadId, stage: newStage })
            }).then(res => { if(res.ok) console.log(`Saved ${leadId}`); }).catch(console.error);
        };
        
        // FIX 2: Changed calculation to use box.height / 4 instead of / 2
        function getAfterElement(container, y) {
            const els = [...container.querySelectorAll('[draggable="true"]:not(.dragging)')];
            return els.reduce((closest, child) => {
                const box = child.getBoundingClientRect();
                // Pivot point is now higher up on the card
                const offset = y - box.top - box.height / 4;
                return (offset < 0 && offset > closest.offset) ? { offset: offset, element: child } : closest;
            }, { offset: Number.NEGATIVE_INFINITY }).element;
        }
    </script>
</x-layout.app>