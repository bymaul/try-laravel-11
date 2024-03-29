<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $page_meta['title'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ $page_meta['action'] }}" method="POST">
                        @csrf
                        @method($page_meta['method'])
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title"
                                class="mt-1 block w-full" type="text"
                                name="title" :value="old('title', $article->title)" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')" />
                            <x-text-area id="content"
                                class="mt-1 block w-full" name="content"
                                rows="12"
                                required>{{ old('content', $article->content) }}</x-text-area>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button type='submit'>
                                {{ $page_meta['submit_button'] }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
