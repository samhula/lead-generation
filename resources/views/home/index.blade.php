<x-layout.marketing>

    <section class="relative overflow-hidden pt-24 pb-20 lg:pt-32 lg:pb-28">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-blue-100/50 rounded-full blur-3xl -z-10 opacity-50"></div>

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-sm font-semibold mb-8 border border-blue-100">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Now accepting early access
                </div>

                <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight text-gray-900 mb-8 leading-[1.1]">
                    Stop managing leads. <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Start closing them.</span>
                </h1>

                <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                    The CRM for people who hate CRMs. CRM Lite strips away the bloat so you can focus on the only thing that matters: <strong>following up.</strong>
                </p>

                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <x-ui.button href="#" class="w-full sm:w-auto px-8 py-4 text-lg shadow-xl shadow-blue-500/20">
                        Get Early Access
                    </x-ui.button>
                    
                    <div class="flex items-center gap-4 px-4 py-2">
                        <div class="flex -space-x-2">
                            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name=A&bg=random" alt=""/>
                            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name=B&bg=random" alt=""/>
                            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name=C&bg=random" alt=""/>
                        </div>
                        <div class="text-sm text-gray-600">
                            Join <span class="font-bold text-gray-900">400+</span> solopreneurs
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative group perspective-1000">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl blur opacity-20 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-gray-900 rounded-xl ring-1 ring-gray-900/5 shadow-2xl overflow-hidden transform transition-transform group-hover:scale-[1.01] duration-500">
                    <div class="h-8 bg-gray-800 border-b border-gray-700 flex items-center px-4 gap-2">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                    <x-ui.dashboard-image 
                        src="storage/homepage/dashboard-preview.png" 
                        alt="Dashboard"
                        class="w-full h-auto opacity-95"
                    />
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-gray-100 bg-gray-50/50 py-10">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-6">Trusted by lean teams at</p>
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
                <span class="text-xl font-bold font-serif">Acme Corp</span>
                <span class="text-xl font-bold font-mono">GlobalBank</span>
                <span class="text-xl font-bold italic">SaaS.io</span>
                <span class="text-xl font-bold">Logipsum</span>
                <span class="text-xl font-bold font-sans">NextLevel</span>
            </div>
        </div>
    </section>

    <section id="features" class="py-24 max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Everything you need. <br>
                <span class="text-blue-600">Nothing to slow you down.</span>
            </h2>
            <p class="mt-4 text-lg text-gray-600">
                Most CRMs are glorified spreadsheets that take hours to update. CRM Lite is designed to be updated in seconds between calls.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2 bg-gray-50 rounded-3xl p-8 border border-gray-100 overflow-hidden relative group hover:border-blue-200 transition-colors">
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-2xl mb-4">🗂</div>
                    <h3 class="text-xl font-bold mb-2">Visual Pipeline</h3>
                    <p class="text-gray-600 max-w-sm">Drag and drop deals across stages. See exactly how much revenue is stuck in "Negotiation" at a glance.</p>
                </div>
                <div class="absolute right-0 bottom-0 w-1/2 h-3/4 bg-white rounded-tl-2xl shadow-lg border-t border-l border-gray-100 p-4 translate-x-4 translate-y-4 group-hover:translate-x-2 group-hover:translate-y-2 transition-transform">
                    <div class="space-y-3">
                        <div class="h-8 bg-blue-100 rounded w-3/4"></div>
                        <div class="h-8 bg-gray-100 rounded w-full"></div>
                        <div class="h-8 bg-gray-100 rounded w-5/6"></div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-600 rounded-3xl p-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center text-2xl mb-4 backdrop-blur-sm">⏰</div>
                    <h3 class="text-xl font-bold mb-2">Smart Reminders</h3>
                    <p class="text-blue-100">Never forget a follow-up. We'll ping you via WhatsApp or Email when a lead goes cold.</p>
                </div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-500 rounded-full blur-3xl opacity-50"></div>
            </div>

            <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 group hover:border-blue-200 transition-colors">
                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-2xl mb-4">👥</div>
                <h3 class="text-xl font-bold mb-2">Instant Context</h3>
                <p class="text-gray-600">Click a contact and see every email, note, and task history instantly. No more digging.</p>
            </div>

            <div class="md:col-span-2 bg-gray-50 rounded-3xl p-8 border border-gray-100 relative overflow-hidden group hover:border-blue-200 transition-colors">
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-2xl mb-4">⚡</div>
                        <h3 class="text-xl font-bold mb-2">Connects with your tools</h3>
                        <p class="text-gray-600 max-w-md">Syncs seamlessly with Slack, WhatsApp, and Discord. Run your business from where you already work.</p>
                    </div>
                    <div class="flex gap-4 mt-8 opacity-60 grayscale group-hover:grayscale-0 transition-all">
                        <span class="font-bold">Slack</span>
                        <span class="font-bold">WhatsApp</span>
                        <span class="font-bold">Discord</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12">Three steps to organized chaos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-gray-100 -z-10"></div>

                <div class="bg-white p-6">
                    <div class="w-12 h-12 mx-auto bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mb-4 border border-blue-100">1</div>
                    <h3 class="font-bold mb-2">Import Leads</h3>
                    <p class="text-gray-500 text-sm">Upload a CSV or add them manually in seconds.</p>
                </div>
                <div class="bg-white p-6">
                    <div class="w-12 h-12 mx-auto bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mb-4 border border-blue-100">2</div>
                    <h3 class="font-bold mb-2">Set Status</h3>
                    <p class="text-gray-500 text-sm">Mark them as "Negotiating" or "Qualified".</p>
                </div>
                <div class="bg-white p-6">
                    <div class="w-12 h-12 mx-auto bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mb-4 border border-blue-100">3</div>
                    <h3 class="font-bold mb-2">Close Deal</h3>
                    <p class="text-gray-500 text-sm">Move them to "Won" and celebrate.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Simple pricing for simple tools</h2>
            <p class="text-gray-600 mb-12">No "per user" fees. No hidden costs. Just one fair price.</p>

            <div class="max-w-lg mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 relative">
                <div class="absolute top-0 right-0 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-bl-xl">EARLY BIRD</div>
                
                <div class="p-8">
                    <h3 class="text-lg font-medium text-gray-500 uppercase tracking-wider mb-4">Lifetime Access</h3>
                    <div class="flex items-baseline justify-center gap-2 mb-6">
                        <span class="text-5xl font-extrabold text-gray-900">$49</span>
                        <span class="text-gray-400 line-through">$199</span>
                    </div>
                    <p class="text-gray-600 mb-8">Pay once, own it forever. Available for the first 500 users only.</p>
                    
                    <ul class="text-left space-y-4 mb-8 max-w-xs mx-auto">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700">Unlimited Contacts</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700">Visual Pipeline</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700">WhatsApp Integration</span>
                        </li>
                    </ul>

                    <x-ui.button href="#" class="w-full py-3 shadow-lg shadow-blue-500/30">
                        Get Lifetime Access
                    </x-ui.button>
                    <p class="text-xs text-gray-400 mt-4">30-day money-back guarantee.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 max-w-3xl mx-auto px-6">
        <h2 class="text-2xl font-bold mb-8 text-center">Frequently Asked Questions</h2>
        <div class="space-y-6">
            <div class="border-b border-gray-100 pb-6">
                <h4 class="font-semibold text-lg mb-2">Is there a free trial?</h4>
                <p class="text-gray-600">We offer a 14-day free trial on the monthly plan. The Lifetime deal comes with a 30-day refund guarantee.</p>
            </div>
            <div class="border-b border-gray-100 pb-6">
                <h4 class="font-semibold text-lg mb-2">Can I import from Excel/CSV?</h4>
                <p class="text-gray-600">Yes! We have a one-click import tool that maps your columns automatically.</p>
            </div>
            <div>
                <h4 class="font-semibold text-lg mb-2">Is my data safe?</h4>
                <p class="text-gray-600">Absolutely. We use bank-level encryption and daily backups. Your data is yours—export it anytime.</p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-900 text-white text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
        
        <div class="relative z-10 max-w-2xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-6 tracking-tight">
                Ready to organize your sales?
            </h2>
            <p class="text-gray-400 text-lg mb-10">
                Join hundreds of solopreneurs closing more deals with less stress.
            </p>
            <x-ui.button href="#" class="px-8 py-4 bg-white text-gray-900 hover:bg-gray-100 shadow-none border-none">
                Start My Free Trial
            </x-ui.button>
        </div>
    </section>

</x-layout.marketing>