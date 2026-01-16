// Define variables globally
let draggedItem = null;
let currentIndicator = null;
let originalColumn = null;

// Attach functions to 'window' so HTML attributes can see them
window.handleDragStart = function(ev) {
    draggedItem = ev.target;
    originalColumn = ev.target.closest('[data-stage]');
    
    ev.dataTransfer.effectAllowed = "move";
    ev.dataTransfer.setData("text/plain", ev.target.id);

    requestAnimationFrame(() => {
        draggedItem.classList.add('dragging');
    });
}

window.handleDragEnd = function(ev) {
    ev.target.classList.remove('dragging');
    removeIndicator();
    
    document.querySelectorAll('.drag-over-column').forEach(el => {
        el.classList.remove('drag-over-column');
    });
    
    draggedItem = null;
    originalColumn = null;
}

window.handleDragOver = function(ev) {
    ev.preventDefault();
    const column = ev.currentTarget;
    
    document.querySelectorAll('.drag-over-column').forEach(el => el.classList.remove('drag-over-column'));
    column.classList.add('drag-over-column');

    if (!currentIndicator) {
        currentIndicator = document.createElement('div');
        currentIndicator.className = 'drop-indicator';
    }

    const afterElement = getDragAfterElement(column, ev.clientY);

    if (afterElement == null) {
        const emptyState = column.querySelector('.empty-placeholder');
        if (emptyState) {
            column.insertBefore(currentIndicator, emptyState);
        } else {
            column.appendChild(currentIndicator);
        }
    } else {
        column.insertBefore(currentIndicator, afterElement);
    }
}

window.handleDrop = function(ev) {
    ev.preventDefault();
    const column = ev.currentTarget;
    column.classList.remove('drag-over-column');

    // Visual Move
    if (currentIndicator && currentIndicator.parentNode === column) {
        column.insertBefore(draggedItem, currentIndicator);
    } else {
        column.appendChild(draggedItem);
    }
    
    // Handle Empty States
    const emptyState = column.querySelector('.empty-placeholder');
    if (emptyState) emptyState.style.display = 'none';

    if (originalColumn && originalColumn !== column) {
            const originalCards = originalColumn.querySelectorAll('.lead-card');
            if (originalCards.length === 0) {
                const originEmpty = originalColumn.querySelector('.empty-placeholder');
                if (originEmpty) originEmpty.style.display = 'flex';
            }
    }

    removeIndicator();

    // Log Data
    const newStage = column.getAttribute('data-stage');
    const leadId = draggedItem.id.replace('lead-', '');
    console.log(`MOVED Lead ${leadId} to ${newStage}`);
}

// Helper (internal function, doesn't need to be global)
function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('.lead-card:not(.dragging)')];

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;

        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child };
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

function removeIndicator() {
    if (currentIndicator && currentIndicator.parentNode) {
        currentIndicator.parentNode.removeChild(currentIndicator);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    
    const observerOptions = {
        root: null, // use the viewport (or you can set it to the column div)
        rootMargin: '100px', // Load data 100px BEFORE the user hits the bottom
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                loadMoreLeads(entry.target);
            }
        });
    }, observerOptions);

    // Start watching all sentinels
    document.querySelectorAll('.loading-sentinel').forEach(el => observer.observe(el));

    async function loadMoreLeads(sentinel) {
        const column = sentinel.closest('[data-stage]');
        const stage = column.getAttribute('data-stage');
        const cursor = column.getAttribute('data-next-cursor');

        if (!cursor || cursor === 'null') {
            sentinel.remove(); // No more data
            return;
        }

        // Prevent double-firing
        if (sentinel.classList.contains('loading')) return;
        sentinel.classList.add('loading');

        try {
            // Fetch the HTML chunk
            const response = await fetch(`/pipeline/load-more?stage=${stage}&cursor=${cursor}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            const data = await response.json();

            // 1. Insert the new HTML *before* the sentinel
            sentinel.insertAdjacentHTML('beforebegin', data.html);

            // 2. Update the cursor for the NEXT load
            if (data.next_cursor) {
                column.setAttribute('data-next-cursor', data.next_cursor);
                sentinel.classList.remove('loading');
            } else {
                // If no more pages, remove the sentinel
                column.setAttribute('data-next-cursor', null);
                sentinel.remove();
            }

            // 3. Re-attach drag listeners to new elements (IMPORTANT)
            // Since we used window.handleDragStart in the previous step, 
            // the ondragstart attributes in the HTML will work automatically!
            
        } catch (error) {
            console.error('Error loading leads:', error);
            sentinel.classList.remove('loading');
        }
    }
});