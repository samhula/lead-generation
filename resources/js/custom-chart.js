import { appendDivToParent, isEmpty } from './utils.js';

/**
 * Custom chart renderer (no Chart.js)
 */
window.renderSalesChart = function (canvasId, chartData) {
    const canvas = document.getElementById(canvasId);
    const ctx = canvas.getContext("2d");

    // Check if there is any chart data
    if (isEmpty(chartData)) {
        appendDivToParent(canvasId, '<p>No data available</p>');
        document.getElementById(canvasId).remove();
        return;
    }

    const { labels, datasets } = chartData;
    const barData = datasets.find(d => d.type === "bar")?.data || [];
    const lineData = datasets.find(d => d.type === "line")?.data || [];

    const width = canvas.width;
    const height = canvas.height;

    const padding = 50;
    const chartW = width - padding * 2;
    const chartH = height - padding * 2;

    const maxValue = Math.max(...barData, ...lineData);
    const scaleY = chartH / maxValue;

    const barWidth = chartW / labels.length - 20;

    // Background
    ctx.fillStyle = "#f9fafb";
    ctx.fillRect(0, 0, width, height);

    // Draw grid lines
    ctx.strokeStyle = "rgba(156, 163, 175, 0.2)";
    ctx.lineWidth = 1;

    const gridSteps = 5;
    const stepValue = maxValue / gridSteps;

    for (let i = 0; i <= gridSteps; i++) {
        const y = padding + chartH - i * stepValue * scaleY;

        ctx.beginPath();
        ctx.moveTo(padding, y);
        ctx.lineTo(width - padding, y);
        ctx.stroke();

        ctx.fillStyle = "#6b7280";
        ctx.font = "12px sans-serif";
        ctx.fillText("$" + Math.round(i * stepValue).toLocaleString(), 10, y + 4);
    }

    // Axes
    ctx.strokeStyle = "#374151";
    ctx.lineWidth = 2;

    // Y axis
    ctx.beginPath();
    ctx.moveTo(padding, padding);
    ctx.lineTo(padding, height - padding);
    ctx.stroke();

    // X axis
    ctx.beginPath();
    ctx.moveTo(padding, height - padding);
    ctx.lineTo(width - padding, height - padding);
    ctx.stroke();

    // Bars
    ctx.fillStyle = "rgba(59, 130, 246, 0.7)"; // Tailwind blue-500

    barData.forEach((value, i) => {
        const x = padding + i * (chartW / labels.length) + 10;
        const barH = value * scaleY;
        const y = padding + chartH - barH;

        ctx.fillRect(x, y, barWidth, barH);
    });

    // Line chart overlay
    ctx.strokeStyle = "rgba(16, 185, 129, 1)"; // green-500
    ctx.lineWidth = 2;
    ctx.beginPath();

    lineData.forEach((value, i) => {
        const x = padding + i * (chartW / labels.length) + barWidth / 2 + 10;
        const y = padding + chartH - value * scaleY;

        if (i === 0) ctx.moveTo(x, y);
        else ctx.lineTo(x, y);
    });

    ctx.stroke();

    // Data points
    ctx.fillStyle = "#fff";
    ctx.strokeStyle = "rgba(16, 185, 129, 1)";
    ctx.lineWidth = 2;

    lineData.forEach((value, i) => {
        const x = padding + i * (chartW / labels.length) + barWidth / 2 + 10;
        const y = padding + chartH - value * scaleY;

        ctx.beginPath();
        ctx.arc(x, y, 4, 0, Math.PI * 2);
        ctx.fill();
        ctx.stroke();
    });

    // X labels
    ctx.fillStyle = "#374151";
    ctx.font = "14px sans-serif";
    ctx.textAlign = "center";

    labels.forEach((label, i) => {
        const x = padding + i * (chartW / labels.length) + barWidth / 2 + 10;
        ctx.fillText(label, x, height - padding + 20);
    });
};

document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("salesOverviewChart")) {
        window.renderSalesChart("salesOverviewChart", {});
    }
});
