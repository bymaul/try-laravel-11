<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Articles') }}
        </h2>

        <a href="{{ route('articles.create') }}"
            class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
            Create Article
        </a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            <div class="relative overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
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
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($articles->isEmpty())
                            <tr class="border-b bg-white">
                                <td colspan="4"
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
                                        {{ $article->content }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-primary-button>
                                            Edit
                                        </x-primary-button>
                                        <x-danger-button>
                                            Delete
                                        </x-danger-button>
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
