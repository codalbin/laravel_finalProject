<x-layout>
    <x-header-nav-bar />
    {{-- <x-slot:title>{{ $title }}</x-slot> --}}
    {{-- <h1>All Questions</h1> --}}
    <div class="py-24 sm:py-4">
        <div class="max-w-4xl px-6 lg:px-8">
            <div class="flex flex-row">
                <div>
                    <form action="{{ route('questions.upvote', $question) }}" method="POST">
                        @csrf
                        <button type="submit">/\</button>
                    </form>
                    {{ $question->votes }}
                    <form action="{{ route('questions.downvote', $question) }}" method="POST">
                        @csrf
                        <button type="submit">\/</button>
                    </form>
                </div>
                <article class="flex my-4 flex-row items-start justify-between gap-x-4">
                    {{-- <div class="flex flex-col text-xs min-w-20 items-end py-3 gap-y-2">
                        <p>{{ $question->votes }} votes</p>
                        <p>{{ $question->answers }} answers</p>
                        <p>{{ $question->views }} views</p>
                    </div> --}}
                    <div>

                        <div class="group relative">
                            <h3 class="mt-3 text-lg leading-6 text-gray-600 group-hover:text-gray-700 py-4 bo">
                                <a href="/questions/{{ $question->slug }}">
                                    {{-- <span class="absolute inset-0"></span> --}}
                                    {{ $question->title }}
                                </a>
                            </h3>
                            <p class="text-xs text-gray-500">
                                Asked {{ $question->created_at->diffForHumans() }}
                                Views : {{ $question->views }}
                            </p>
                            {{-- <p class="border-b">votes</p> --}}
                            <p class="mt-5 text-sm leading-6 text-gray-600">{{ $question->body }}</p>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="flex justify-between items-center mb-5 text-gray-700">
                                <a href="/questions?tag={{ $question->tag->slug }}" class="hover:underline">
                                    <span class="bg-{{ $question->tag->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
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
                            </div>
                        </div>
                    </div>
                    {{-- <hr class="border-10 border-gray-500" /> --}}
                </article>
            </div>


            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-6 border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-1">
                @foreach ($answers as $answer)
                    <article class="flex flex-row items-start justify-between border-t-2 border-gray gap-x-4">
                        {{-- <div class="flex flex-col text-xs min-w-20 items-end py-3 gap-y-2"> --}}
                            {{-- <p>{{ $question->votes }} votes</p> --}}
                            {{-- <p>{{ $question->answers }} answers</p>
                            <p>{{ $question->views }} views</p> --}}
                        {{-- </div> --}}
                        <div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg leading-6 text-blue-600 group-hover:text-blue-700">
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 flex md:justify-left">{{ $answer->body }}</p>
                            </div>

                            {{-- <div class="relative mt-8 flex items-center gap-x-4">
                            </div> --}}

                            <div class="flex md:justify-right w-full items-center gap-x-4 mt-4">
                                <img src="{{$answer->user->image}}" alt="{{$answer->user->image}}" class="h-4 w-4 rounded-full bg-gray-50">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="/questions?user={{ $answer->user->username }}" class="hover:underline">
                                            <div class="flex items-center space-x-4">
                                                <span class="font-medium text-xs dark:text-black">
                                                    {{$answer->user->name}}
                                                </span>
                                            </div>
                                        </a>
                                    </p>
                                </div>
                                <time datetime="2020-03-16" class="text-gray-500">answered {{ $answer->created_at->diffForHumans() }}</time>
                            </div>
                        </div>
                    </article>
                @endforeach

                <div class="border-t-2 mt-4 pt-4">
                    <h3 class="py-6 text-lg">Your Answer</h3>
                    @livewire('answer-form', ['question_id' => $question->id])

                </div>

            <!-- More posts... -->
            </div>
        </div>
    </div>
    {{ $answers->links() }}
    </div>


</x-layout>
