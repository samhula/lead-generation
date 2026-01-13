<x-layout.app>
    <div class="max-w-4xl mx-auto px-6 py-10 space-y-8">

        {{-- Integration header --}}
        {{ $header }}

        {{-- Connection / status --}}
        {{ $connection }}

        {{-- Settings --}}
        {{ $settings ?? null }}

        {{-- Preview --}}
        {{ $preview ?? null }}

        {{-- Activity log --}}
        {{ $activity ?? null }}

        {{-- Danger zone --}}
        {{ $danger ?? null }}

    </div>
</x-layout.app>
