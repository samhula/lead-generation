<x-layout.app title="Tasks">

    <div class="max-w-5xl mx-auto">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">My Agenda</h1>
                <p class="text-sm text-gray-500">You have 5 tasks remaining today.</p>
            </div>
            <div class="flex gap-2">
                <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    New Task
                </button>
            </div>
        </div>


        <div class="bg-white shadow-sm border-b border-gray-200 px-4 sm:px-6 py-3 mb-6 rounded-t-xl">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <nav class="flex space-x-4" aria-label="Tabs">
                    <a href="#" class="bg-red-50 text-red-700 px-3 py-2 font-medium text-sm rounded-md">
                        Overdue (2)
                    </a>
                    <a href="#" class="bg-blue-50 text-blue-700 px-3 py-2 font-medium text-sm rounded-md" aria-current="page">
                        Today (5)
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">
                        Upcoming
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">
                        Completed
                    </a>
                </nav>

                <div class="flex items-center gap-2">
                    <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <svg class="-ml-0.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
                        </svg>
                        Filters
                    </button>
                </div>
            </div>
        </div>


        <div class="mb-6 relative rounded-md shadow-sm">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-500 sm:text-sm">✨</span>
            </div>
            <input type="text" name="quick-add" id="quick-add" class="block w-full rounded-lg border-0 py-3 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="e.g. Call Acme Corp about proposal tomorrow at 2pm...">
            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                <kbd class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">↵ Enter</kbd>
            </div>
        </div>


        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">

            <div class="border-b border-gray-100 bg-red-50/30 px-4 py-2">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-red-800">Overdue</h3>
            </div>
            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex items-center gap-4 px-4 py-3 sm:px-6 hover:bg-gray-50 group transition-colors">
                    <div class="flex h-6 items-center">
                        <input id="task-1" name="task-1" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-600 cursor-pointer">
                    </div>
                    
                    <div class="flex items-center gap-2 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-red-500">
                          <path fill-rule="evenodd" d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12a1.5 1.5 0 010 2.12l-4.122 4.12a1.5 1.5 0 01-1.06.44H4.5A1.5 1.5 0 013 16.5v-13zm1.5 0v13h6.879l3.439-3.44-3.439-3.439V3.5H4.5z" clip-rule="evenodd" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                          <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Follow up on missing contract info</p>
                                <a href="#" class="mt-1 inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-xs font-medium text-blue-700 hover:bg-blue-100">
                                    🏢 Acme Corp Deal ($5k)
                                </a>
                            </div>
                            <div class="text-right text-sm text-red-600 font-medium whitespace-nowrap">
                                Yesterday
                            </div>
                        </div>
                    </div>
                    
                    <div class="hidden sm:flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="p-1.5 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded">Snooze</button>
                        <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded"> Edit</button>
                    </div>
                </li>
            </ul>


            <div class="border-t border-b border-gray-100 bg-gray-50/50 px-4 py-2">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">Today, Jan 14</h3>
            </div>
            <ul role="list" class="divide-y divide-gray-100">

                <li class="flex items-center gap-4 px-4 py-3 sm:px-6 hover:bg-gray-50 group transition-colors">
                    <div class="flex h-6 items-center">
                        <input id="task-2" name="task-2" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-600 cursor-pointer">
                    </div>
                    <div class="flex items-center gap-2 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                          <path d="M3 4a2 2 0 00-2 2v8a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2H3z" />
                          <path d="M10 10.293l-6.3-6.3a1 1 0 111.414-1.414L10 7.465l4.886-4.886a1 1 0 111.414 1.414L10 10.293z" />
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Send intro packet to new lead</p>
                                <a href="#" class="mt-1 inline-flex items-center gap-1 rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600 hover:bg-gray-200">
                                    👤 Sarah Jones (Lead)
                                </a>
                            </div>
                            <div class="text-right text-sm text-gray-500 whitespace-nowrap">
                                2:00 PM
                            </div>
                        </div>
                    </div>
                    <div class="hidden sm:flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="p-1.5 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded">Snooze</button>
                        <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded"> Edit</button>
                    </div>
                </li>

                 <li class="flex items-center gap-4 px-4 py-3 sm:px-6 hover:bg-gray-50 group transition-colors">
                    <div class="flex h-6 items-center">
                        <input id="task-3" name="task-3" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-600 cursor-pointer">
                    </div>
                    <div class="flex items-center gap-2 text-gray-400">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                          <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Zoom sync: Proposal Review</p>
                                </div>
                            <div class="text-right text-sm text-gray-500 whitespace-nowrap">
                                4:30 PM
                            </div>
                        </div>
                    </div>
                     <div class="hidden sm:flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="p-1.5 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded">Snooze</button>
                        <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded"> Edit</button>
                    </div>
                </li>

            </ul>
        </div>

    </div>
</x-layout.app>