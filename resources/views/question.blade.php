<x-layout>
    <x-header-nav-bar />
    <div class="py-24 sm:py-4">
        <div class="max-w-4xl px-6 lg:px-8">
            <article class="items-start justify-between gap-x-4">
                <div>
                    <div class="border-b-2 pb-4">
                        <h3 class="mt-3 text-2xl leading-6 text-gray-800 group-hover:text-gray-900 py-4 bo">
                            <a href="/questions/{{ $question->slug }}">{{ $question->title }}</a>
                        </h3>
                        <p class="text-xs text-gray-700">
                            Asked {{ $question->created_at->diffForHumans() }} |
                            Viewed {{ $question->views_count }} times
                        </p>
                    </div>
                    <div class="mt-5">
                        <div class="flex gap-x-6">
                            <div class="flex flex-col items-center">
                                <form action="{{ route('questions.upvote', $question) }}" method="POST">
                                    @csrf
                                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#212121"><path d="M327.69-420 480-572.46 632.31-420H327.69Z"/></svg></button>
                                </form>
                                <h3 class="font-bold">
                                    {{ $question->votes_count }}
                                </h3>
                                <form action="{{ route('questions.downvote', $question) }}" method="POST">
                                    @csrf
                                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#212121"><path d="M480-387.69 327.69-539.85h304.62L480-387.69Z"/></svg></button>
                                </form>
                            </div>
                            <div>
                                <p class="mt-2 text-sm leading-6 text-gray-600">{{ $question->body }}</p>
                                <div class="flex justify-between w-full mt-5">
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
                        </div>
                    </div>
                </div>
            </article>

            <p class="mt-10 text-md">
                {{ $question->answers->count() }} answers
            </p>

            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-10 border-gray-200 mt-4 lg:mx-0 lg:max-w-none lg:grid-cols-1">
                @foreach ($answers as $answer)
                <div class="flex gap-x-4">
                    <div class="flex flex-col items-center mt-3">
                        <form action="{{ route('answers.upvote', [$question, $answer]) }}" method="POST">
                            @csrf
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#212121"><path d="M327.69-420 480-572.46 632.31-420H327.69Z"/></svg></button>
                        </form>
                        <h3 class="font-bold">
                            {{ $answer->votes_count }}
                        </h3>
                        <form action="{{ route('answers.downvote', [$question, $answer]) }}" method="POST">
                            @csrf
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#212121"><path d="M480-387.69 327.69-539.85h304.62L480-387.69Z"/></svg></button>
                        </form>
                    </div>
                    <article class="flex flex-row items-start justify-between border-t-2 border-gray gap-x-4">
                        <div>
                            <div class="group relative">
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 flex md:justify-left">{{ $answer->body }}</p>
                            </div>

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
                                <p class="text-gray-500 text-sm">answered {{ $answer->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach

                <div class="border-t-2 mt-4 pt-4">
                    <h3 class="py-6 text-lg">Your Answer</h3>
                    @livewire('answer-form', ['question_id' => $question->id])
                </div>
            </div>
        </div>
    </div>
    {{ $answers->links() }}
    </div>


</x-layout>
