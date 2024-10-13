@if (session()->has('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="bg-red-800 text-white px-4 py-2 rounded-lg">
        {{ session('error') }}
    </div>
@endif

<form wire:submit="send" method="post" class="max-w-xl">
    <div class="bg-gray-50 space-y-6 border-b border-gray-900/10 pb-12 max-w-xl w-full">
        <div class="sm:col-span-4 bg-white p-6 rounded-md border-gray-200 border-2">
            <label for="user_id" class="block text-sm font-medium leading-6 text-gray-900">User ID</label>
            <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                    <input type="text" name="user_id" id="user_id" wire:model="user_id" autocomplete="user_id" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="1">
                </div>
                @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="sm:col-span-4 bg-white p-6 rounded-md border-gray-200 border-2">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                    <input type="text" name="title" id="title" autocomplete="title" wire:model="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="New Question">
                </div>
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="sm:col-span-4 bg-white p-6 rounded-md border-gray-200 border-2">
            <label for="tag_id" class="block text-sm font-medium leading-6 text-gray-900">Tag ID</label>
            <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                    <input type="text" name="tag_id" id="tag_id" autocomplete="title" wire:model="tag_id" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="New Question">
                </div>
                @error('tag_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="sm:col-span-4 bg-white p-6 rounded-md border-gray-200 border-2">
            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Question</label>
            <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                    <textarea id="body" name="body" rows="3" wire:model="body" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder=" What is your question about ?"></textarea>
                </div>
            </div>
            @error('body') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Post</button>
    </div>
</form>

