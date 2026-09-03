<x-app-layout>
    <div class="min-h-screen bg-cover bg-center bg-no-repeat p-6" 
         style="background-image: url('https://i.pinimg.com/736x/39/7f/bb/397fbbb37e93111ab0bbeb1550ca28c2.jpg');">

        <div class="max-w-3xl mx-auto bg-white bg-opacity-80 backdrop-blur-md shadow rounded-lg p-8">

            <!-- Article Title -->
            <h2 class="text-3xl font-extrabold mb-4 text-gray-900">{{ $article->title }}</h2>

            <!-- Article Description & Content -->
            <p class="mt-2 text-gray-800">{{ $article->description }}</p>
            <p class="mt-4 text-gray-800">{{ $article->content }}</p>

            <div class="mt-4 text-sm text-gray-600">
                Category: <span class="font-medium">{{ $article->category->name ?? 'Uncategorized' }}</span>
            </div>

            <!-- Buttons: Favorite / Edit / Delete in one line -->
            <div class="flex flex-wrap gap-4 mt-6">

                @auth
                    @php
                        $isFavorited = $article->favorites()->where('user_id', auth()->id())->exists();
                    @endphp

                    <form method="POST" action="{{ route('favorite.store', $article) }}">
                        @csrf
                        <button class="px-4 py-2 rounded-lg shadow font-semibold transition duration-200
                            {{ $isFavorited ? 'bg-pink-500 hover:bg-pink-600 text-white' : 'bg-pink-200 hover:bg-pink-300 text-pink-900' }}">
                            {{ $isFavorited ? '💔 Unfavorite' : '❤️ Add to Favorite' }}
                        </button>
                    </form>
                @endauth

                <a href="{{ route('articles.edit', $article) }}"
                   class="bg-blue-200 hover:bg-blue-300 text-blue-900 px-4 py-2 rounded-lg shadow font-semibold transition duration-200">
                   ✏️ Edit
                </a>

                <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-200 hover:bg-red-300 text-red-900 px-4 py-2 rounded-lg shadow font-semibold transition duration-200">
                        🗑️ Delete
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
