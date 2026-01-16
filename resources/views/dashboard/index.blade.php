@props(['name'])

<x-layout.app>
    <div class="space-y-8">

        <x-dashboard.welcome-header :name="$name" :show-add-deal="true" />

        <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
            <x-ui.kpi-card label="New Leads" value="{{ $new_leads }}" trend="+12%" color="blue">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </x-ui.kpi-card>
            <x-ui.kpi-card label="Deals in Progress" value="{{ $deals_in_progress }}" trend="+5%" color="purple">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            </x-ui.kpi-card>
            <x-ui.kpi-card label="Conversion Rate" value="{{ $conversion_rate }}%" trend="-2.4%" color="yellow">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </x-ui.kpi-card>
            <x-ui.kpi-card label="Total Revenue" value="{{ $formatted_revenue }}" trend="+8.5%" color="green">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </x-ui.kpi-card>
        </section>

        <section class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            
            <div class="xl:col-span-2">
                <x-dashboard.sales-overview-card :chart-data="$chart_data" />
            </div>

            <div class="xl:col-span-1">
                <x-dashboard.recent-activity>
                    @foreach($recent_activities as $activity)
                        <x-ui.activity-item 
                            :title="$activity->description" 
                            :time="$activity->created_at->diffForHumans(null, true, true)"
                            :type="$activity->type" 
                        />
                    @endforeach
                </x-dashboard.recent-activity>
            </div>
        </section>

<section>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="font-bold text-xl text-gray-900">Pipeline Snapshot</h2>
            <p class="text-sm text-gray-500">
                You have <span class="font-bold text-gray-900">5 active deals</span>.
            </p>
        </div>
        <a href="{{ route('pipeline.index') }}" class="group flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors">
            View Full Board
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 h-full items-start">
        
        <x-ui.pipeline.column title="New" color="blue" count="{{ count($pipeline_leads['New']) }}" total="$6,200">
            @foreach($pipeline_leads['New'] as $lead)
                <x-ui.pipeline.item :title="$lead->title" :value="$lead->value" />
            @endforeach
        </x-ui.pipeline.column>

        <x-ui.pipeline.column title="Contacted" color="purple" count="{{ count($pipeline_leads['Contacted']) }}" total="$15,000">
            @foreach($pipeline_leads['Contacted'] as $lead)
                <x-ui.pipeline.item :title="$lead->title" :value="$lead->value" />
            @endforeach
        </x-ui.pipeline.column>

        <x-ui.pipeline.column title="Qualified" color="yellow" count="{{ count($pipeline_leads['Qualified']) }}" total="$8,500">
            @foreach($pipeline_leads['Qualified'] as $lead)
                <x-ui.pipeline.item :title="$lead->title" :value="$lead->value" />
            @endforeach
        </x-ui.pipeline.column>

        <x-ui.pipeline.column title="Proposal" color="orange" count="{{ count($pipeline_leads['Proposal']) }}" total="$22,000">
            @foreach($pipeline_leads['Proposal'] as $lead)
                <x-ui.pipeline.item :title="$lead->title" :value="$lead->value" />
            @endforeach
        </x-ui.pipeline.column>

        <x-ui.pipeline.column title="Won" color="green" count="{{ count($pipeline_leads['Won / Lost']) }}" total="$3,000">
            @foreach($pipeline_leads['Won / Lost'] as $lead)
                <x-ui.pipeline.item :title="$lead->title" :value="$lead->value" />
            @endforeach
        </x-ui.pipeline.column>

    </div>
</section>
        
    </div>
</x-layout.app>