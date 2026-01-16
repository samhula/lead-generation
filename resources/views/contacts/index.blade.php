<x-layout.app title="Contacts">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Contacts</h1>
            <p class="text-sm text-gray-500 mt-1">
                You have <span class="font-semibold text-gray-900">142</span> active leads and customers.
            </p>
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition-all">
                Import
            </button>
            <button class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-all">
                Add Contact
            </button>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
        <div class="flex p-1 bg-gray-100 rounded-lg self-start sm:self-auto">
            <button class="px-4 py-1.5 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm">All</button>
            <button class="px-4 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">Leads</button>
            <button class="px-4 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">Customers</button>
            <button class="px-4 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">Archived</button>
        </div>

        <div class="relative w-full sm:w-72">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" class="block w-full rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Search by name, email, or company...">
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 sm:pl-6">Name</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Company & Role</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Last Contact</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    
                    @php
                        // Mock Data
                        $contacts = [
                            [
                                'name' => 'Sarah Connor', 'email' => 'sarah@skynet.com', 'initials' => 'SC', 'color' => 'bg-blue-100 text-blue-600',
                                'company' => 'Cyberdyne Systems', 'role' => 'CTO',
                                'status' => 'Lead', 'status_color' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
                                'last_seen' => '2 days ago'
                            ],
                            [
                                'name' => 'James Bond', 'email' => '007@mi6.gov.uk', 'initials' => 'JB', 'color' => 'bg-gray-100 text-gray-600',
                                'company' => 'MI6', 'role' => 'Field Agent',
                                'status' => 'Customer', 'status_color' => 'bg-green-50 text-green-700 ring-green-600/20',
                                'last_seen' => '5 hours ago'
                            ],
                            [
                                'name' => 'Ellen Ripley', 'email' => 'ripley@weyland.corp', 'initials' => 'ER', 'color' => 'bg-yellow-100 text-yellow-600',
                                'company' => 'Weyland-Yutani', 'role' => 'Warrant Officer',
                                'status' => 'Cold', 'status_color' => 'bg-gray-50 text-gray-600 ring-gray-500/10',
                                'last_seen' => '3 weeks ago'
                            ],
                            [
                                'name' => 'Tony Stark', 'email' => 'tony@stark.com', 'initials' => 'TS', 'color' => 'bg-red-100 text-red-600',
                                'company' => 'Stark Industries', 'role' => 'CEO',
                                'status' => 'Lead', 'status_color' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
                                'last_seen' => 'Yesterday'
                            ],
                        ];
                    @endphp

                    @foreach($contacts as $contact)
                    <tr class="group hover:bg-gray-50/80 transition-colors">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full {{ $contact['color'] }} font-medium text-sm">
                                        {{ $contact['initials'] }}
                                    </span>
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{ $contact['name'] }}</div>
                                    <div class="text-xs text-gray-500">{{ $contact['email'] }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-3 py-4">
                            <div class="text-sm text-gray-900">{{ $contact['company'] }}</div>
                            <div class="text-xs text-gray-500">{{ $contact['role'] }}</div>
                        </td>

                        <td class="whitespace-nowrap px-3 py-4">
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $contact['status_color'] }}">
                                {{ $contact['status'] }}
                            </span>
                        </td>

                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $contact['last_seen'] }}
                        </td>

                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-1.5 text-gray-400 hover:text-gray-900 bg-white border border-gray-200 rounded shadow-sm hover:shadow-md transition-all" title="Email">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </button>
                                <button class="p-1.5 text-gray-400 hover:text-gray-900 bg-white border border-gray-200 rounded shadow-sm hover:shadow-md transition-all" title="Call">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">142</span> results
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-gray-900 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">3</a>
                        <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" /></svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>