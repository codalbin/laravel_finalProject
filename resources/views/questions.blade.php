<x-layout>
    <x-header-nav-bar />
    <div class="py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 flex justify-between">

                @if(request('tag'))
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Questions tagged with {{ App\Models\Tag::where('slug', request('tag'))->first()->name }}</h2>
                @elseif(request('user'))
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Questions by {{ App\Models\User::where('username', request('user'))->first()->name }}</h2>
                @else
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</h2>
                @endif
                <a href="/new-question" class="bg-blue-500 rounded-md p-2 text-white hover:bg-blue-600">Ask Question</a>
            </div>
            <p class="mt-4">{{ $nb_questions }} Questions</p>
            <!-- Search bar -->
            <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
                <div class="mx-auto max-w-screen-md sm:text-center">
                    <form>
                        @if(!request('tag') && !request('user'))
                            <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                                <div class="relative w-full">
                                    <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                        </svg>                                          
                                    </div>
                                    <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-white border border-black rounded-lg focus:ring-primary-500 focus:border-primary-500" placeholder="Search a question" type="search" id="search" name="search" autocomplete="off">
                                </div>
                                <div>
                                    <button type="submit" class="bg-blue-500 ml-1 border border-blue-500 rounded-md p-2 text-white hover:bg-blue-600">Search</button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>            
            <div class="w-full mx-auto mb-10 grid max-w-none grid-cols-1 gap-x-8 gap-y-6 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-1">
                @forelse ($questions as $question)
                    <article class="w-full flex border-t-2 border-gray-300 gap-x-4">

                        <div class="flex flex-col text-xs min-w-20 items-end py-3 gap-y-2">
                            <p>{{ $question->votes_count }} votes</p>
                            <p>{{ $question->answers->count() }} answers</p>
                            <p>{{ $question->views_count }} views</p>
                        </div>
                        <div class="w-full">
                            <div class="group relative">
                                <h3 class="mt-3 text-lg leading-6 text-blue-600 group-hover:text-blue-700">
                                <a href="/questions/{{ $question->slug }}" class="flex md:justify-left">
                                    <span class="absolute inset-0"></span>
                                    {{ $question->title }}
                                </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ Str::limit($question->body, 150)}}</p>
                            </div>

                            <div class="flex md:justify-between w-full mt-4">
                                <div class="flex justify-between items-center mb-5 text-gray-700">
                                    <a href="/questions?tag={{ $question->tag->slug }}" class="hover:underline">
                                        <span class="bg-{{ $question->tag->color }}-100 text-black-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:text-black-800">
                                            {{ $question->tag->name }}
                                        </span>
                                    </a>
                                </div>

                                <div class="flex items-center gap-x-4">
                                    <img src="{{$question->user->image}}" alt="{{$question->user->image}}" class="h-4 w-4 rounded-full bg-gray-50">
                                    <div class="text-sm leading-6">
                                        <p class="font-semibold text-gray-900">
                                            <a href="/questions?user={{ $question->user->username }}" class="hover:underline">
                                                <div class="flex items-center space-x-4">
                                                    <span class="font-medium text-xs dark:text-black">
                                                        {{$question->user->name}}
                                                    </span>
                                                </div>
                                            </a>
                                        </p>
                                    </div>
                                    <time datetime="2020-03-16" class="text-gray-500">{{ $question->created_at->diffForHumans() }}</time>
                                </div>

                            </div>
                        </div>
                    </article>
                @empty 
                <div>
                    <p class="font-semibold text-xl my-4">No question found</p>
                    <a href="/questions" class="block text-blue-600 hover:underline">&laquo; Back to Questions page</a>
                </div>
                @endforelse
            </div>
            {{ $questions->links() }}
        </div>
    </div>


</x-layout>
