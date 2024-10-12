<x-layout>
    <x-header-nav-bar/>
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mb-8 max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ask a public question</h2>
            </div>
            @livewire('question-form')
        </div>
    </div>
</x-layout>
