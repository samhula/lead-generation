@props([
    'events' => []
])

<div class="bg-white rounded-xl p-6 shadow-sm">
    <h2 class="font-semibold text-lg mb-4">Notifications</h2>

    <div class="space-y-4">
        @foreach($events as $key => $enabled)
            <label class="flex items-center justify-between">
                <span class="text-sm text-gray-700">
                    {{ $key }}
                </span>

                <input
                    type="checkbox"
                    name="events[{{ Str::slug($key, '_') }}]"
                    @checked($enabled)
                    class="rounded border-gray-300"
                />
            </label>
        @endforeach
    </div>
</div>
