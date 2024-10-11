<x-layout>
    <x-header-nav-bar />
    {{-- <x-slot:title>{{ $title }}</x-slot> --}}
    {{-- <h1>All Questions</h1> --}}

    <div class="py-24 sm:py-4">
        <div class="mx-auto max-w-4xl px-6 lg:px-8">
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
                    {{-- <p class="border-b">votes</p> --}}
                    <p class="mt-5 text-sm leading-6 text-gray-600">{{ $question->body }}</p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4">

                </div>
                <div class="flex justify-between w-full">
                    <div>
                        <a href="/tags" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-sm text-gray-600 hover:bg-gray-100">Marketing</a>
                    </div>

                    <div class="flex items-center gap-x-4">
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-4 w-4 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="/test">
                                    {{-- <span class="absolute inset-0"></span> --}}
                                    author {{ $question->user_id }}
                                </a>
                            </p>
                        </div>
                        <time datetime="2020-03-16" class="text-gray-500">Asked{{ $question->created_at->diffForHumans() }}</time>
                    </div>

                </div>
            </div>
            {{-- <hr class="border-10 border-gray-500" /> --}}
            </article>

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-6 border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-1">
                @foreach ($answers as $answer)
                    <article class="flex flex-row items-start justify-between border-t-2 border-gray gap-x-4">
                        {{-- <div class="flex flex-col text-xs min-w-20 items-end py-3 gap-y-2">
                            <p>{{ $question->votes }} votes</p>
                            <p>{{ $question->answers }} answers</p>
                            <p>{{ $question->views }} views</p>
                        </div> --}}
                        <div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg leading-6 text-blue-600 group-hover:text-blue-700">
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 flex md:justify-left">{{ $answer->body }}</p>
                            </div>

                            {{-- <div class="relative mt-8 flex items-center gap-x-4">
                            </div> --}}

                            <div class="flex md:justify-right w-full items-center gap-x-4 mt-4">
                                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-4 w-4 rounded-full bg-gray-50">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="/test">
                                            {{-- <span class="absolute inset-0"></span> --}}
                                            author {{ $answer->user_id }}
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
