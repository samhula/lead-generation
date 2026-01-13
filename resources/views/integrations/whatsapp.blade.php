@php
    // Mimic backend variables
    $connected = false; 
    $userIsAdmin = true; // Toggle to test read-only mode
@endphp

<x-integration.layout>

    <x-slot:header>
        <div class="flex items-start justify-between">
            <x-integration.header
                title="WhatsApp"
                description="Send high-priority CRM alerts directly to your phone or a team group chat via the WhatsApp Business API."
                logo="{{ asset('storage/integration_logos/whatsapp_small.png') }}"
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
                        <div class="h-12 w-12 bg-green-50 rounded-full flex items-center justify-center text-xl text-green-600">
                            📱
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Business Account</p>
                            <h3 class="text-lg font-bold text-gray-900">+1 (555) 012-3456</h3>
                            <p class="text-xs text-gray-400">Meta Business ID: 88291023</p>
                        </div>
                    </div>
                    <x-ui.button variant="outline" size="sm" href="#">
                        Manage on Meta
                    </x-uibutton>
                </div>
            @else
                <div class="text-center py-4">
                    <div class="mb-4 text-gray-600 text-sm">
                        Link your WhatsApp Business account to send automated messages.
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#25D366] hover:bg-[#128C7E] text-white rounded-md font-medium transition-colors shadow-sm">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Connect via Meta
                    </a>
                </div>
            @endif
        </div>
    </x-slot:connection>

    <x-slot:settings>
        <fieldset @if(!$userIsAdmin) disabled class="opacity-75" @endif class="space-y-8">
            
            <section>
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Notification Routing</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <x-form.select
                        label="Send messages to"
                        helper="Who should receive the CRM alerts?"
                        :options="['My Number', 'Team List', 'Specific Contact']"
                        selected="My Number"
                        id="wa_route_select"
                    />

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Target Phone Number</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">📞</span>
                            </div>
                            <input type="text" class="block w-full rounded-md border-gray-300 pl-10 focus:border-green-500 focus:ring-green-500 sm:text-sm py-2" placeholder="+1 (555) 987-6543" value="+1 (202) 555-0199">
                        </div>
                        <p class="text-xs text-gray-500">Must include country code.</p>
                    </div>

                </div>
            </section>

            <hr class="border-gray-100">

            <section>
                <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Event Triggers</h4>
                <div class="space-y-3">
                    <x-form.toggle-row
                        label="New Leads"
                        description="Instant alert when a new lead enters the pipeline."
                        :checked="true"
                    />
                    <x-form.toggle-row
                        label="Urgent Tasks"
                        description="Receive alerts for tasks marked 'High Priority'."
                        :checked="true"
                    />
                    <x-form.toggle-row
                        label="Deal Won"
                        description="Get that dopamine hit when a deal closes!"
                        :checked="true"
                    />
                </div>
            </section>

            <section class="bg-green-50/50 rounded-md p-4 border border-green-100">
                <div class="flex items-start gap-3">
                    <x-form.checkbox 
                        id="templates"
                        label="Use Approved Templates Only"
                        description="Strictly enforces Meta-approved notification templates to avoid bans."
                        checked
                    />
                </div>
            </section>
        </fieldset>
    </x-slot:settings>

    <x-slot:preview>
        <x-integration.preview title="Phone Preview">
            
            <div class="bg-[#ECE5DD] p-4 rounded-md font-sans h-64 flex flex-col justify-end overflow-hidden relative">
                <div class="absolute inset-0 opacity-10 bg-[url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png')] bg-repeat"></div>

                <div class="relative bg-white p-2 rounded-lg rounded-tl-none shadow-sm self-start max-w-[85%] mb-3 z-10 text-xs">
                    <p class="text-gray-800">Your CRM Connection is active.</p>
                    <div class="text-[10px] text-gray-400 text-right mt-1">9:40 AM</div>
                </div>

                <div class="relative bg-[#E7FFDB] p-2.5 rounded-lg rounded-tr-none shadow-sm self-end ml-auto max-w-[90%] z-10">
                    <div class="text-sm text-gray-800 leading-snug">
                        <strong>🚀 Deal Won!</strong><br><br>
                        Reference: <span class="text-blue-500">#DL-4920</span><br>
                        Customer: <span class="font-semibold">Acme Corp</span><br>
                        Amount: <span class="font-semibold">$4,500</span>
                    </div>
                    
                    <div class="flex items-center justify-end gap-1 mt-1">
                        <span class="text-[10px] text-gray-500">9:42 AM</span>
                        <svg class="w-3 h-3 text-[#53bdeb]" fill="currentColor" viewBox="0 0 16 11">
                            <path d="M10.854 0L12 1.127 6.136 6.909 3.864 4.67 5.01 3.542l1.126 1.11L10.854 0zm-5.69 10.02L6.31 11.147 16 1.593 14.855.466 5.164 10.02zM1.146 5.37L0 6.5l4.032 3.974 1.147-1.127L1.146 5.37z"/>
                        </svg>
                    </div>
                </div>

            </div>
        </x-integration.preview>
    </x-slot:preview>

    <x-slot:danger>
        
        <div class="mb-10">
            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Recent Activity</h4>
            <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Event</th>
                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Time</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3"><span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full">Delivered</span></td>
                            <td class="px-4 py-3 text-sm">Deal Won</td>
                            <td class="px-4 py-3 text-sm text-right text-gray-500">2m ago</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3"><span class="text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded-full">Sent</span></td>
                            <td class="px-4 py-3 text-sm">New Lead</td>
                            <td class="px-4 py-3 text-sm text-right text-gray-500">1h ago</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <x-integration.danger-zone 
            title="Disconnect WhatsApp"
            message="This will revoke the access token from your Meta Business account."
            disconnect-route="#" 
        />
    </x-slot:danger>

</x-integration.layout>