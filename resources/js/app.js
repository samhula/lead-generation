import './bootstrap';
import './custom-chart.js'; // Add this

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('dark-toggle');
    const html = document.documentElement;

    // Apply saved theme from localStorage
    const saved = localStorage.getItem('theme');
    if (saved === 'dark') html.classList.add('dark');
    else html.classList.remove('dark'); // remove dark explicitly for light

    // Toggle theme on button click
    if (toggle) {
        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            const theme = html.classList.contains('dark') ? 'dark' : 'light';
            localStorage.setItem('theme', theme);
            console.log('Theme toggled:', theme);
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('global-search-overlay');
    const backdrop = document.getElementById('global-search-backdrop');
    const modal = document.getElementById('global-search-modal');
    const input = document.getElementById('global-search-input');
    const button = document.getElementById('open-global-search');

    const isMac = /Mac|iPhone|iPad/.test(navigator.userAgent);

    function openSearch() {
        overlay.classList.remove('hidden');

        requestAnimationFrame(() => {
            backdrop.classList.remove('opacity-0');
            modal.classList.remove('opacity-0', 'scale-95', 'translate-y-2');
        });

        setTimeout(() => input.focus(), 120);
    }

    function closeSearch() {
        backdrop.classList.add('opacity-0');
        modal.classList.add('opacity-0', 'scale-95', 'translate-y-2');

        setTimeout(() => {
            overlay.classList.add('hidden');
            input.value = '';
        }, 200);
    }

    // Keyboard shortcut
    document.addEventListener('keydown', (e) => {
        const openShortcut =
            (isMac && e.metaKey && e.key.toLowerCase() === 'k') ||
            (!isMac && e.ctrlKey && e.key.toLowerCase() === 'k');

        if (openShortcut) {
            e.preventDefault();
            openSearch();
        }

        if (e.key === 'Escape') {
            closeSearch();
        }
    });

    // Click handlers
    backdrop.addEventListener('click', closeSearch);
    button.addEventListener('click', openSearch);
});