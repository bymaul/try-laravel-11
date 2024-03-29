<x-app-layout>
    <x-slot name="header">
        <div
            class="flex flex-col items-center justify-center gap-4 sm:flex-row sm:justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Articles') }}
            </h2>
            <a href="{{ route('articles.create') }}"
                class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                Create Article
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            <div class="relative overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500"
                    aria-label="Articles">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($articles->isEmpty())
                            <tr class="border-b bg-white">
                                <td colspan="5"
                                    class="px-6 py-4 text-center">
                                    No articles found.
                                </td>
                            </tr>
                        @else
                            @foreach ($articles as $article)
                                <tr class="border-b bg-white">
                                    <th scope="row" class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td
                                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $article->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="line-clamp-2">
                                            {{ $article->content }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $article->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div
                                            class="flex items-center justify-center gap-3">
                                            <a href="{{ route('articles.show', $article) }}"
                                                class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
                                                View
                                            </a>
                                            <a href="{{ route('articles.edit', $article) }}"
                                                class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
                                                Edit
                                            </a>
                                            <form
                                                action="{{ route('articles.destroy', $article) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    Delete
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
