<x-app-layout>

    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Articles</h2>
                    <p class="text-sm text-gray-500">Manage all your articles</p>
                </div>

                <a href="{{ route('articles.create') }}"
                   class="mt-4 sm:mt-0 inline-flex items-center
                          bg-blue-600 hover:bg-blue-700
                          text-white px-5 py-2.5 rounded-lg
                          font-medium shadow transition">
                    + Add Article
                </a>
            </div>

            {{-- Search --}}
            <form method="GET" action="{{ route('articles.index') }}" class="mb-6 max-w-md">
                <div class="flex gap-2">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search articles..."
                           class="flex-1 px-4 py-2 border rounded-lg
                                  focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500">

                    <button type="submit"
                            class="px-4 py-2 bg-gray-800 hover:bg-gray-900
                                   text-white rounded-lg transition">
                        Search
                    </button>
                </div>
            </form>

            {{-- Table --}}
            <div class="bg-white rounded-xl shadow border overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold text-gray-700">
                                Title
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-700">
                                Category
                            </th>
                            <th class="px-6 py-4 text-right font-semibold text-gray-700">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse($articles as $article)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    <a href="{{ route('articles.show', $article) }}"
                                       class="hover:text-blue-600">
                                        {{ $article->title }}
                                    </a>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-block bg-blue-100 text-blue-700
                                                 px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $article->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('articles.show', $article) }}"
                                       class="text-blue-600 hover:underline">
                                        View
                                    </a>

                                    <a href="{{ route('articles.edit', $article) }}"
                                       class="text-indigo-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('articles.destroy', $article) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-10 text-gray-500">
                                    No articles found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $articles->appends(request()->query())->links() }}
            </div>

        </div>
    </div>

</x-app-layout>
