<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $article->title }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6 text-gray-900">
                    <div class="flex items-center justify-between">
                        <div>
                            <span
                                class="text-sm font-semibold text-gray-500">Author:</span>
                            <span
                                class="text-sm font-semibold text-gray-900">{{ $article->user->name }}</span>
                        </div>
                        <div>
                            <span
                                class="text-sm font-semibold text-gray-500">Published:</span>
                            <span class="text-sm font-semibold text-gray-900">
                                {{ $article->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <p class="p-6 text-gray-900">
                        {{ $article->content }}
                    </p>
                </div>
            </div>
        </div>
</x-app-layout>
