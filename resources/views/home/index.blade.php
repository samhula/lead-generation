<x-layout.marketing>

        <!-- HERO -->
    <section class="relative max-w-7xl mx-auto px-6 pt-24 pb-32 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

        <!-- Copy -->
        <div>
            <span class="inline-flex items-center gap-2 mb-6 text-sm font-semibold text-blue-600">
                Built for solopreneurs and small teams
            </span>

            <h1 class="text-4xl sm:text-5xl xl:text-6xl font-bold tracking-tight mb-6">
                Never forget to<br class="hidden sm:block">
                <span class="text-blue-600">follow up</span> again.
            </h1>

            <p class="text-lg text-gray-600 max-w-xl mb-10">
                CRM Lite shows you exactly who to follow up with,
                what stage they’re in, and what to do next -
                without setup, clutter, or busywork.
            </p>

            <div class="flex flex-wrap items-center gap-6">
                <x-ui.button href="#">
                    Get Early Access
                </x-ui.button>

                <a
                    href="#how-it-works"
                    class="text-sm font-medium text-gray-600 hover:text-gray-900 transition inline-flex items-center gap-1"
                >
                    See how it works →
                </a>
            </div>

            <!-- Micro reassurance -->
            <p class="mt-6 text-sm text-gray-500">
                No credit card required · Takes less than 2 minutes to start
            </p>
        </div>

        <!-- Product Preview -->
        <div class="relative">
            <x-ui.dashboard-image
                src="storage/homepage/dashboard-preview.png"
                alt="Simple CRM dashboard showing follow-ups and deals"
            />
        </div>

    </section>

    <!-- PROBLEM -->
    <section class="bg-gray-50 py-28">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <h2 class="text-3xl sm:text-4xl font-bold mb-6">
                Most CRMs make small teams work harder.
            </h2>

            <p class="text-gray-600 text-lg max-w-2xl mx-auto mb-16">
                When you’re running sales and follow-ups without a dedicated sales team,
                keeping track of leads shouldn’t feel like another full-time job -
                but most tools weren’t built for lean teams moving fast.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-left">
                <x-ui.feature-item
                    icon="⏰"
                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition"
                >
                    <span class="font-semibold block mb-1">
                        Follow-ups slip through
                    </span>
                    Important follow-ups get missed when everything lives in your head.
                </x-ui.feature-item>

                <x-ui.feature-item
                    icon="🧠"
                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition"
                >
                    <span class="font-semibold block mb-1">
                        No shared clarity
                    </span>
                    You lose track of who’s active - and who’s gone cold.
                </x-ui.feature-item>

                <x-ui.feature-item
                    icon="🧾"
                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition"
                >
                    <span class="font-semibold block mb-1">
                        Too much admin
                    </span>
                    CRMs feel like busywork instead of helping you close deals.
                </x-ui.feature-item>
            </div>

        </div>
    </section>

    <!-- SOLUTION -->
    <section class="max-w-6xl mx-auto px-6 py-20">

        <h2 class="text-3xl font-bold text-center mb-12">
            Everything you need - <span class="text-blue-600">nothing you don’t.</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <x-ui.feature-card
                title="Know who to follow up with today"
                description="Your homepage shows overdue and upcoming follow-ups for you and your team the moment you log in."
                icon="✅"
            />

            <x-ui.feature-card
                title="See every deal at a glance"
                description="Move deals through a simple pipeline without spreadsheets or setup."
                icon="📊"
            />

            <x-ui.feature-card
                title="No manual logging"
                description="Every action is tracked automatically so you always know what happened last."
                icon="⚡"
            />

        </div>

    </section>

    <!-- WHY CRM LITE -->
    <section class="max-w-4xl mx-auto px-6 py-20 text-center">

        <h2 class="text-3xl font-bold mb-6">
            Stay consistent without thinking about it.
        </h2>

        <p class="text-gray-600 text-lg">
            CRM Lite keeps follow-ups, deals, and next steps
            in one calm place — so you and your team stay consistent
            without things slipping through the cracks.
        </p>

    </section>


    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="max-w-6xl mx-auto px-6 py-20">

        <h2 class="text-3xl font-bold text-center mb-12">
            How it works
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

            <x-ui.step number="1" title="Add a contact">
                Add the next person you need to follow up with.
            </x-ui.step>

            <x-ui.step number="2" title="Schedule a follow-up">
                Set a reminder in seconds.
            </x-ui.step>

            <x-ui.step number="3" title="Close more deals">
                Stay consistent and never let leads slip.
            </x-ui.step>

        </div>

    </section>

    <!-- FINAL CTA -->
    <section class="py-24 bg-blue-600 text-white text-center">
        <h2 class="text-3xl font-bold mb-6">
            Spend less time managing leads.<br>
            Spend more time closing them.
        </h2>

        
        <!-- REMEMBER TO USE ui button and href route register -->
            Get Early Access →
    </section>

</x-layout.marketing>
