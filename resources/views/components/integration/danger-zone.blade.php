@props(['disconnectRoute'])

<div class="border border-red-200 rounded-xl p-6">
    <h3 class="font-semibold text-red-600 mb-2">
        Disconnect integration
    </h3>

    <p class="text-sm text-gray-600 mb-4">
        This will immediately stop all messages.
    </p>

    <form method="POST" action="{{ $disconnectRoute }}">
        @csrf
        <x-ui.button variant="danger">
            Disconnect
        </x-ui.button>
    </form>
</div>
