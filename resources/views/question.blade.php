<x-layout>
    <x-header-nav-bar />
    {{-- <x-slot:title>{{ $title }}</x-slot> --}}
    {{-- <h1>All Questions</h1> --}}

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0">
            {{-- <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Question</h2> --}}
            {{-- <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.</p> --}}
          </div>

          <article class="flex max-w-xl my-4 flex-row items-start justify-between gap-x-4">
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
                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ Str::limit($question->body, 150)}}</p>
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
                        <time datetime="2020-03-16" class="text-gray-500">{{ $question->created_at->diffForHumans() }}</time>
                    </div>

                </div>
            </div>
            </article>

          <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-6 border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-1">
            @foreach ($answers as $answer)
                <article class="flex max-w-xl flex-row items-start justify-between border-t-2 border-gray gap-x-4">
                <div class="flex flex-col text-xs min-w-20 items-end py-3 gap-y-2">
                    {{-- <p>{{ $question->votes }} votes</p>
                    <p>{{ $question->answers }} answers</p>
                    <p>{{ $question->views }} views</p> --}}
                </div>
                <div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg leading-6 text-blue-600 group-hover:text-blue-700">
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $answer->body }}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">

                    </div>
                    <div class="flex justify-between w-full">
                        <div>
                            {{-- <a href="/tags" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-sm text-gray-600 hover:bg-gray-100">Marketing</a> --}}
                        </div>

                        <div class="flex items-center gap-x-4">
                            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-4 w-4 rounded-full bg-gray-50">
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    <a href="/test">
                                        {{-- <span class="absolute inset-0"></span> --}}
                                        author {{ $answer->user_id }}
                                    </a>
                                </p>
                            </div>
                            <time datetime="2020-03-16" class="text-gray-500">answered {{ $question->created_at->diffForHumans() }}</time>
                        </div>

                    </div>
                </div>
                </article>
            @endforeach
            <!-- More posts... -->
          </div>
        </div>
      </div>
    </div>


</x-layout>
