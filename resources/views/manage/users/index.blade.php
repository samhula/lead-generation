@props(['users'])

<x-layout.app title="Manage Users">

    <!-- Main Content -->
    <div class="flex-1 space-y-8 overflow-y-auto">

        <!-- Page Title + Button -->
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Manage Users</h1>
            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg shadow">
                + Create User
            </button>
        </div>

        <!-- User Table Card -->
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="font-semibold text-lg mb-4">User Directory</h2>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-500 text-sm border-b border-gray-200">
                        <th class="p-3">User</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Role</th>
                        <th class="p-3 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="text-sm">

                @foreach ($users as $user)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                        <td class="p-3 font-medium">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3 capitalize">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                @if($user->role === 'admin')
                                    bg-red-100 text-red-700
                                @elseif($user->role === 'manager')
                                    bg-yellow-100 text-yellow-700
                                @else
                                    bg-green-100 text-green-700
                                @endif">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="p-3 text-right">
                            <button class="text-blue-600 hover:underline mr-3">Edit</button>
                            <button class="text-red-600 hover:underline">Delete</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>

</x-layout.app>
