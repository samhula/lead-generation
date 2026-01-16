@props(['user'])

<tr class="group hover:bg-gray-50 transition-colors">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full object-cover border border-gray-200" 
                     src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                     alt="">
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                <div class="text-xs text-gray-500">{{ $user->email }}</div>
            </div>
        </div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        @if($user->role === 'admin')
            <span class="inline-flex items-center gap-1 rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">
                🛡️ Admin
            </span>
        @elseif($user->role === 'manager')
            <span class="inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                👔 Manager
            </span>
        @else
            <span class="inline-flex items-center gap-1 rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                💼 Sales
            </span>
        @endif
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        @if($user->active)
            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span> Active
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                <span class="h-1.5 w-1.5 rounded-full bg-gray-500"></span> Offline
            </span>
        @endif
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $user->last_seen }}
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="text-gray-400 hover:text-blue-600 transition-colors" title="Edit User">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </button>
            <button class="text-gray-400 hover:text-red-600 transition-colors" title="Remove User">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        </div>
    </td>
</tr>