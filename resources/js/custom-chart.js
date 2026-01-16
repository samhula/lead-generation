import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('salesOverviewChart');

    if (ctx) {
        // 1. Safe parsing with error handling
        try {
            const rawData = JSON.parse(ctx.getAttribute('data-chart'));

            // 2. Render
            new Chart(ctx, {
                type: 'bar',
                data: rawData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' }
                    },
                    scales: {
                        y: { 
                            beginAtZero: true,
                            border: { display: false },
                            grid: { color: '#f3f4f6' }
                        },
                        x: {
                            grid: { display: false },
                            border: { display: false }
                        }
                    }
                }
            });
        } catch (e) {
            console.error("Error parsing chart data:", e);
        }
    }
});