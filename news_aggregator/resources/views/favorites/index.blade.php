<x-app-layout>
    <div class="min-h-screen py-10 px-6"
         style="background-image: url('https://i.pinimg.com/736x/39/7f/bb/397fbbb37e93111ab0bbeb1550ca28c2.jpg'); background-size: cover; background-position: center;">

        <div class="max-w-7xl mx-auto bg-white/90 backdrop-blur-md shadow-xl rounded-2xl p-8">

            <h2 class="text-4xl font-extrabold text-gray-800 mb-8 text-center drop-shadow-sm">
                My Favorites
            </h2>
            <p class="text-gray-600 text-center mb-8">Saved articles for quick access</p>

            @if($favorites->count())

                <div class="overflow-x-auto rounded-xl shadow-md border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Article</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Category</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($favorites as $fav)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        <a href="{{ route('articles.show', $fav->article) }}" class="hover:text-indigo-600 hover:underline">
                                            {{ $fav->article->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $fav->article->category->name ?? 'Uncategorized' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-2 flex-wrap">

                                            {{-- Unfavorite --}}
                                            <form method="POST" action="{{ route('favorite.store', $fav->article) }}">
                                                @csrf
                                                <button class="px-3 py-1 text-sm font-semibold rounded-lg bg-pink-500 hover:bg-pink-600 text-white transition duration-200">
                                                    💔 Unfavorite
                                                </button>
                                            </form>

                                            {{-- View --}}
                                            <a href="{{ route('articles.show', $fav->article) }}"
                                               class="px-3 py-1 text-sm font-semibold rounded-lg bg-green-200 hover:bg-green-300 text-green-900 transition duration-200">
                                                View
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('articles.edit', $fav->article) }}"
                                               class="px-3 py-1 text-sm font-semibold rounded-lg bg-blue-200 hover:bg-blue-300 text-blue-900 transition duration-200">
                                                ✏️ Edit
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('articles.destroy', $fav->article) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-3 py-1 text-sm font-semibold rounded-lg bg-red-200 hover:bg-red-300 text-red-900 transition duration-200">
                                                    🗑️ Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-6 flex justify-center">
                    {{ $favorites->links() }}
                </div>

            @else
                {{-- Empty State --}}
                <div class="bg-white rounded-xl shadow p-12 text-center">
                    <div class="text-4xl mb-4">🤍</div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">No favorites yet</h3>
                    <p class="text-gray-500 mb-6">You haven’t saved any articles.</p>

                    <a href="{{ route('articles.index') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Browse Articles
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
