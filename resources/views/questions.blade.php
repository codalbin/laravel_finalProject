<x-layout>
    <x-header-nav-bar />
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 flex justify-between">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</h2>
                <a href="/new-question" class="bg-blue-500 rounded-md p-2 text-white hover:bg-blue-600">Ask Question</a>
            </div>
            <p class="mt-5">{{ $questions->count() }} Questions</p>
            <div class="w-full mx-auto mt-2 mb-10 grid max-w-none grid-cols-1 gap-x-8 gap-y-6 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-1">
                @foreach ($questions as $question)
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
                @endforeach
            </div>
            {{ $questions->links() }}
        </div>
    </div>


</x-layout>
