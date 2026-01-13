@php
    $connected = false; 
@endphp

<x-integration.layout>

    <x-slot:header>
        <div class="flex items-start justify-between">
            <x-integration.header
                title="Discord"
                description="Streamline your workflow by piping CRM events directly into your community or team server."
                logo="{{ asset('storage/integration_logos/discord_small.png') }}"
            />
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium {{ $connected ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $connected ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                {{ $connected ? 'Active' : 'Not Connected' }}
            </span>
        </div>
    </x-slot:header>

    <x-slot:connection>
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            @if($connected)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="h-12 w-12 bg-gray-100 rounded-full flex items-center justify-center text-xl">
                            👾
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Connected to Server</p>
                            <h3 class="text-lg font-bold text-gray-900">Creative Agency HQ</h3>
                            <p class="text-xs text-gray-400">Added on Jan 12, 2024</p>
                        </div>
                    </div>
                    <x-form.button variant="outline" size="sm" href="#">
                        Re-authenticate
                    </x-form.button>
                </div>
            @else
                <div class="text-center py-4">
                    <div class="mb-4 text-gray-600 text-sm">
                        Connect your Discord account to start receiving real-time notifications.
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#5865F2] hover:bg-[#4752C4] text-white rounded-md font-medium transition-colors shadow-sm">
                        Connect Discord
                    </a>
                </div>
            @endif
        </div>
    </x-slot:connection>

    <x-slot:settings>
        <div class="space-y-8">
            
            <section>
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Routing Configuration</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-form.select
                        label="Destination Type"
                        helper="Do you want to notify the whole team or just yourself?"
                        :options="['Server Channel', 'Direct Message (Bot)']"
                        selected="Server Channel"
                    />

                    <x-form.select
                        label="Target Channel"
                        helper="We recommend a dedicated #crm-updates channel."
                        :options="['#general', '#sales-wins', '#leads', '#reminders']"
                        selected="#sales-wins"
                    />
                </div>
            </section>

            <hr class="border-gray-100">

            <section>
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Event Triggers</h4>
                <div class="space-y-3">
                    <x-form.toggle-row
                        label="New Deal Created"
                        description="Triggers when a lead is converted to a deal."
                        :checked="true"
                    />
                    <x-form.toggle-row
                        label="Deal Won / Updated"
                        description="Celebrate wins! Triggers on stage changes or value updates."
                        :checked="true"
                    />
                    <x-form.toggle-row
                        label="Task Reminders"
                        description="Get nudged 30 mins before a scheduled task."
                        :checked="true"
                    />
                    <x-form.toggle-row
                        label="Daily Summary"
                        description="A morning digest of today's agenda (Sent at 8:00 AM)."
                        :checked="false"
                    />
                </div>
            </section>

            <section class="bg-blue-50/50 rounded-md p-4 border border-blue-100">
                <div class="flex items-start gap-3">
                    <x-form.checkbox 
                        id="mentions"
                        label="Enable @mentions for High Value Deals"
                        description="Mentions @here only for deals over $1,000."
                        checked
                    />
                </div>
            </section>
        </div>
    </x-slot:settings>

    <x-slot:preview>
        <x-integration.preview title="Channel Preview">
            <div class="bg-[#36393f] p-4 rounded-md font-sans text-gray-100 leading-snug">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-xs">🤖</div>
                    <div>
                        <span class="text-green-400 text-sm font-medium hover:underline cursor-pointer">CRM Bot</span>
                        <span class="bg-[#5865f2] text-[10px] text-white px-1 rounded mx-1">BOT</span>
                        <span class="text-xs text-gray-400">Today at 9:41 AM</span>
                    </div>
                </div>

                <div class="ml-11 border-l-4 border-green-500 bg-[#2f3136] rounded p-3 max-w-sm shadow-sm">
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-white text-sm mb-1">🚀 Deal Won: Acme Corp</h4>
                    </div>
                    <p class="text-xs text-gray-300 mb-3">The proposal has been signed and the invoice paid.</p>
                    
                    <div class="grid grid-cols-2 gap-2 mb-2">
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase">Value</p>
                            <p class="text-sm text-white">$4,500</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase">Owner</p>
                            <p class="text-sm text-white">Alex S.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 mt-2 text-[10px] text-gray-400">
                        <span>📄 View in CRM</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 flex justify-end">
                <button class="text-xs text-gray-500 hover:text-gray-700 underline">Send Test Message</button>
            </div>
        </x-integration.preview>
    </x-slot:preview>1

    <x-slot:danger>
        <x-integration.danger-zone 
            title="Disconnect Discord"
            message="This will stop all automated messages. You can reconnect at any time."
            disconnect-route="#" 
        />
    </x-slot:danger>

</x-integration.layout>