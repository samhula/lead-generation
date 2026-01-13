<!-- SIDEBAR NAVIGATION START -->
<nav class="px-4 space-y-6 text-sm py-4">
    <x-layout.sidebar-section title="Main">
        <x-layout.nav-item icon="🏠" label="Dashboard" :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')" />
        <x-layout.nav-item icon="🗂" label="Pipeline" :href="route('pipeline.index')" :active="request()->routeIs('pipeline.index')" />
        <x-layout.nav-item icon="👥" label="Contacts" href="/contacts" :active="request()->routeIs('contact.index')" />
        <x-layout.nav-item icon="📝" label="Tasks" :href="route('tasks.index')" :active="request()->routeIs('tasks.index')" />
        <x-layout.nav-item icon="📊" label="Analytics" href="/analytics" :active="request()->routeIs('analytics.index')" />
    </x-layout.sidebar-section>

    <x-layout.sidebar-section title="Integrations">
        <x-layout.nav-item iconImage="{{ asset('storage/integration_logos/slack_small.png') }}" label="Slack" href="{{ route('slack.settings') }}" />
        <x-layout.nav-item iconImage="{{ asset('storage/integration_logos/whatsapp_small.png') }}" label="WhatsApp" href="{{ route('whatsapp.settings') }}" />
        <x-layout.nav-item iconImage="{{ asset('storage/integration_logos/discord_small.png') }}" label="Discord" href="{{ route('discord.settings') }}" />
    </x-layout.sidebar-section>

    <x-layout.sidebar-section title="Management">
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        <x-layout.nav-item icon="👤" label="Manage Users" :href="route('manage.users.index')" />
        <x-layout.nav-item icon="⚙️" label="Settings" href="/settings" />
        
    </x-layout.sidebar-section>
</nav>
<!-- SIDEBAR NAVIGATION END -->