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
    <div class="bg-gray-5 space-y-2  pb-6">
        <div class="sm:col-span-4 rounded-md">
            <label for="user_id" class="block text-sm font-medium leading-6 text-gray-900">User ID</label>
            <div class="mt-2">
                <div class="flex rounded-sm shadow-sm bg-white ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="user_id" id="user_id" wire:model="user_id" autocomplete="user_id" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="1">
                </div>
                @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="sm:col-span-4 rounded-md">
            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Answer</label>
            <div class="mt-2">
                <div class="flex rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <textarea id="body" name="body" rows="3" wire:model="body" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 bg-white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder=" What is your answer ?"></textarea>
                </div>
            </div>
            @error('body') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="mt-6 flex items-center justify-start gap-x-6">
        {{-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button> --}}
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Post</button>
    </div>
</form>

