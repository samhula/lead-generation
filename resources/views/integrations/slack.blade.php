<x-integration.layout>

    <x-slot:header>
        <x-integration.header
            title="Slack"
            description="Send CRM reminders and deal updates to Slack."
            logo="{{ asset('storage/integration_logos/slack_small.png') }}"
            :connected="false"
            connected-as="Workspace XYZ"
        />
    </x-slot:header>

    <x-slot:connection>
        <x-integration.connect-card
            :connected="false"
            connect-route="#"
            disconnect-route="#"
        />
    </x-slot:connection>

    <x-slot:settings>
        <x-integration.event-toggles />
    </x-slot:settings>

    <x-slot:preview>
        <x-integration.preview title="Message preview">
            ⏰ Follow up with Alex today.
        </x-integration.preview>
    </x-slot:preview>

    <x-slot:danger>
        <x-integration.danger-zone disconnect-route="#" />
    </x-slot:danger>

</x-integration.layout>
