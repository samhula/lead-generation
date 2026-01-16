@props(['chartData'])

<div class="h-full bg-white rounded-2xl border border-gray-200 shadow-sm p-6 flex flex-col">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="font-bold text-lg text-gray-900">Sales Overview</h2>
            <p class="text-sm text-gray-500">Revenue performance over time</p>
        </div>
        <select class="appearance-none bg-gray-50 border border-gray-200 text-sm rounded-lg p-2 pr-8 cursor-pointer">
            <option>This Year</option>
        </select>
    </div>
    
    <div class="relative flex-1 w-full min-h-[300px]">
        <canvas 
            id="salesOverviewChart" 
            data-chart='@json($chartData)'
        ></canvas>
    </div>
</div>