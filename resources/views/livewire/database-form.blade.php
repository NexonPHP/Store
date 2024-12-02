<div class="h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-12 rounded-md shadow-md w-full max-w-md">
        <h3 class="text-2xl font-bold text-black mb-6">Enter your database details</h3>
        <form wire:submit="save" method="POST">
            @if($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                    <ul>
                        {!! implode('', $errors->all('<li class="p-2">:message</li>')) !!}
                    </ul>
                </div>
            @endif
                @if (session('status'))
                    <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                        {{ session('status') }}
                    </div>
                @endif

            <div class="mb-4">
                <label for="db_host" class="block text-sm font-medium text-gray-700">Database Hostname</label>
                <input type="text" wire:model="db_host" id="db_host"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                       required>
            </div>
            <div class="mb-4">
                <label for="db_username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" wire:model="db_username" id="db_username"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                       required>
            </div>
            <div class="mb-4">
                <label for="db_password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" wire:model="db_password" id="db_password"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                       required>
            </div>
            <div class="mb-4">
                <label for="db_name" class="block text-sm font-medium text-gray-700">Database Name</label>
                <input type="text" wire:model="db_name" id="db_name"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                       required>
            </div>
            <div class="mb-6">
                <label for="db_port" class="block text-sm font-medium text-gray-700">Port Number</label>
                <input type="text" wire:model="db_port" id="db_port"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                       required>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-primary hover:bg-primary-dark text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Next
                </button>
            </div>
        </form>
    </div>
</div>

