@props([
    'connected' => false,
    'connectRoute',
    'disconnectRoute'
])

<div class="bg-white rounded-xl p-6 shadow-sm flex items-center justify-between">
    <div>
        <h2 class="font-semibold text-lg">Connection</h2>
        <p class="text-sm text-gray-600">
            Control whether this integration is active.
        </p>
    </div>

    @if($connected)
        <form method="POST" action="{{ $disconnectRoute }}">
            @csrf
            <x-ui.button variant="secondary">
                Disconnect
            </x-ui.button>
        </form>
    @else
        <a href="{{ $connectRoute }}">
            <x-ui.button>
                Connect
            </x-ui.button>
        </a>
    @endif
</div>
