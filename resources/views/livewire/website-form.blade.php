<div class="h-screen flex items-center justify-center">
    <div class="bg-white p-12 rounded-md shadow-md w-full max-w-md">
        <h3 class="text-2xl font-bold text-black mb-6">Enter your website details</h3>
        @if($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                <ul>
                    {!! implode('', $errors->all('<li class="p-2">:message</li>')) !!}
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            <div class="mb-4">
                <label for="website_name" class="block text-sm font-medium text-gray-700">Website Name</label>
                <input type="text" name="website_name" id="website_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" required>
            </div>
            <div class="mb-4">
                <label for="website_description" class="block text-sm font-medium text-gray-700">Website Description</label>
                <textarea name="website_description" id="website_description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
