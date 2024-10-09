<x-layout>
    <x-header-nav-bar />
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">All Users</h2>
            </div>
            <div class="mx-auto mt-10 grid max-w-7xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:grid-cols-4 lg:mx-0">
                @foreach ($users as $user)
                    <a href="#" class="flex flex-col items-center justify-between bg-gray-50 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                        <div class="group relative flex flex-col items-center space-y-4">
                            <img class="w-20 h-20 rounded-full object-cover" src="{{$user->image}}" alt="{{$user->image}}" />
                            <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600 mt-4">
                                {{ $user->name }}
                            </h3>
                        </div>
                        <div class="flex items-center gap-x-4 text-sm text-gray-500 mt-4">
                            <time datetime="{{ $user->created_at->format('Y-m-d') }}">Member since {{ $user->created_at->format('Y-m-d') }}</time>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
