<nav class="space-y-6">
    
    <x-layout.sidebar-section title="Overview">
        <x-layout.nav-item icon="🏠" label="Dashboard" :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')" />
        <x-layout.nav-item icon="🗂" label="Pipeline" :href="route('pipeline.index')" :active="request()->routeIs('pipeline.index')" />
        <x-layout.nav-item icon="👥" label="Contacts" :href="route('contacts.index')" :active="request()->routeIs('contacts.index')" />
        <x-layout.nav-item icon="📝" label="Tasks" :href="route('tasks.index')" :active="request()->routeIs('tasks.index')" badge="5" />
        <x-layout.nav-item icon="📊" label="Analytics" href="/analytics" :active="request()->routeIs('analytics.index')" />
    </x-layout.sidebar-section>

    <x-layout.sidebar-section title="Integrations">
        <x-layout.nav-item label="Slack" href="{{ route('slack.settings') }}" :icon_image="asset('storage/integration_logos/slack_small.png')" />
        <x-layout.nav-item label="WhatsApp" href="{{ route('whatsapp.settings') }}" :icon_image="asset('storage/integration_logos/whatsapp_small.png')" />
        <x-layout.nav-item label="Discord" href="{{ route('discord.settings') }}" :icon_image="asset('storage/integration_logos/discord_small.png')" />
    </x-layout.sidebar-section>

    <x-layout.sidebar-section title="System">
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        
        @for($i = 0; $i < 5; $i++)
            <x-layout.nav-item icon="🔧" label="Config {{ $i+1 }}" href="#" />
        @endfor
    </x-layout.sidebar-section>

</nav>