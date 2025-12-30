document.addEventListener('DOMContentLoaded', () => {
const pipeline = document.getElementById('pipeline');
if (!pipeline) return;

// helpers
const getColumns = () => Array.from(document.querySelectorAll('.kanban-col'));
let centers = [];      // [{el, centerX}]
let boundaries = [];   // x positions between columns
let indicator = null;  // the blue line DOM node
let dragging = null;   // { card, originalParent, originalNextSibling }

function computeColumnCenters() {
    const cols = getColumns();
    centers = cols.map(col => {
    const r = col.getBoundingClientRect();
    return { el: col, centerX: r.left + r.width / 2 };
    });
    boundaries = [];
    for (let i = 0; i < centers.length - 1; i++) {
    boundaries.push((centers[i].centerX + centers[i + 1].centerX) / 2);
    }
}

function getColumnIndexForX(x) {
    if (!centers.length) return -1;
    if (centers.length === 1) return 0;
    for (let i = 0; i < boundaries.length; i++) {
    if (x < boundaries[i]) return i;
    }
    return centers.length - 1;
}

function createIndicator() {
    if (!indicator) {
    indicator = document.createElement('div');
    indicator.className = 'drop-indicator';
    }
    return indicator;
}

// Find where in the column to insert (before which child)
function findInsertBefore(targetCol, clientY, draggedCard) {
    const cards = Array.from(
        targetCol.querySelectorAll('.lead-card')
    ).filter(c => c !== draggedCard);

    for (const card of cards) {
        const r = card.getBoundingClientRect();
        const midY = r.top + r.height / 2;
        if (clientY < midY) return card;
    }

    return null;
}

function onPointerMove(e) {
if (!dragging) return;
const x = e.clientX;
const y = e.clientY;

const colIndex = getColumnIndexForX(x);
if (colIndex < 0 || !centers[colIndex]) {
    if (indicator && indicator.parentNode) indicator.remove();
    return;
}

const column = centers[colIndex].el;
const targetCol = column.querySelector('.cards-container');
if (!targetCol) return;

// 🛑 Prevent showing indicator in the original column
// if dragged card is the only child (or if drop would be in same place).
if (targetCol === dragging.originalParent.closest('.cards-container')) {
    const cards = Array.from(targetCol.querySelectorAll('.lead-card')).filter(c => c !== dragging.card);
    if (cards.length === 0) {
        if (indicator && indicator.parentNode) indicator.remove();
        return; // no need for indicator
    }
}

const insertBefore = findInsertBefore(targetCol, y, dragging.card);
const ind = createIndicator();

if (insertBefore) {
    if (ind.parentNode !== targetCol || ind.nextSibling !== insertBefore) {
    targetCol.insertBefore(ind, insertBefore);
    }
} else {
    if (ind.parentNode !== targetCol || ind.nextSibling !== null) {
    targetCol.appendChild(ind);
    }
}
}

function onPointerUp(e) {
    if (!dragging) return;

    // If indicator is in a column, move the card to be before the indicator
    if (indicator && indicator.parentNode) {
    indicator.parentNode.insertBefore(dragging.card, indicator);
    // cleanup the indicator
    indicator.remove();
    } else {
    // No valid drop: restore original position
    if (dragging.originalNextSibling) {
        dragging.originalParent.insertBefore(dragging.card, dragging.originalNextSibling);
    } else {
        dragging.originalParent.appendChild(dragging.card);
    }
    }

    // restore card state
    dragging.card.classList.remove('dragging');
    dragging.card.style.pointerEvents = ''; // re-enable pointer events
    dragging = null;

    // remove global listeners
    window.removeEventListener('pointermove', onPointerMove);
    window.removeEventListener('pointerup', onPointerUp);
}

// start drag (delegated)
pipeline.addEventListener('pointerdown', (e) => {
    const el = e.target.closest('.lead-card');
    if (!el) return;
    // only left button
    if (e.button && e.button !== 0) return;

    e.preventDefault(); // prevent text selection for example

    computeColumnCenters(); // compute columns & boundaries at drag start

    // store original place in case we need to revert
    dragging = {
    card: el,
    originalParent: el.parentNode,
    originalNextSibling: el.nextSibling
    };

    // visual state: make the original semi-transparent and allow pointer events to pass through
    el.classList.add('dragging');
    el.style.pointerEvents = 'none'; // so elementFromPoint (if used) hits what's underneath

    // attach global listeners
    window.addEventListener('pointermove', onPointerMove);
    window.addEventListener('pointerup', onPointerUp);
});

// recompute centers if layout changes
window.addEventListener('resize', computeColumnCenters);
// sometimes content changes dynamically → recompute before next drag attempt
// you can call computeColumnCenters() manually if you change columns/cards programmatically
});