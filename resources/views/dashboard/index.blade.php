@props(['name'])

<x-layout.app>

    <!-- WELCOME -->
    <x-dashboard.welcome-header :name="$name" :show-add-deal="true" />

    <!-- KPI CARDS -->
    <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
        <x-ui.kpi-card label="New Leads" icon="📥" value="{{ $new_leads }}" />
        <x-ui.kpi-card label="Deals in Progress" icon="📂" value="{{ $deals_in_progress }}" />
        <x-ui.kpi-card label="Conversion Rate" icon="📈" value="{{ $conversion_rate }}" />
        <x-ui.kpi-card label="Revenue" icon="💰" value="{{ $formatted_revenue }}" />
    </section>

    <!-- CHART & ACTIVITY -->
    <section class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <x-dashboard.sales-overview-card />

        <x-dashboard.recent-activity>
            @foreach($recent_activities as $recent_activity)
                <x-ui.activity-item>{{ $recent_activity }}</x-ui.activity-item>
            @endforeach
        </x-dashboard.recent-activity>
    </section>

    <!-- PIPELINE PREVIEW -->
    <section>
        <h2 class="font-bold text-xl mb-4">Pipeline Overview</h2>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            <x-ui.pipeline.column title="New" colour="text-blue-600">
                <x-ui.pipeline.item>Lead A</x-ui.pipeline.item>
            </x-ui.pipeline.column>

            <x-ui.pipeline.column title="Contacted" colour="text-yellow-600">
                <x-ui.pipeline.item>Lead B</x-ui.pipeline.item>
            </x-ui.pipeline.column>

            <x-ui.pipeline.column title="Qualified" colour="text-teal-600">
                <x-ui.pipeline.item>Lead C</x-ui.pipeline.item>
            </x-ui.pipeline.column>

            <x-ui.pipeline.column title="Proposal" colour="text-purple-600">
                <x-ui.pipeline.item>Lead D</x-ui.pipeline.item>
            </x-ui.pipeline.column>

            <x-ui.pipeline.column title="Won / Lost" colour="text-green-600">
                <x-ui.pipeline.item>Lead E</x-ui.pipeline.item>
            </x-ui.pipeline.column>
        </div>
    </section>

</x-layout.app>