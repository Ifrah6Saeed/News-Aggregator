<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700">
       News_Aggregator
      </h2>
    </x-slot>

    {{-- Background Wrapper --}}
    <div class="min-h-screen bg-cover bg-center relative"
         style="background-image: url('https://i.pinimg.com/1200x/2e/08/14/2e0814e726ddfc9f25d3ca4a985de0ad.jpg');">

        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Content --}}
        <div class="relative py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

                {{-- Welcome --}}
                <div>
                    <h1 class="text-2xl font-bold text-white">
                        Welcome, {{ Auth::user()->name }}
                    </h1>
                    <p class="text-gray-300 text-sm">
                        Manage your content efficiently
                    </p>
                </div>

                {{-- Action Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <a href="{{ route('articles.create') }}"
                       class="bg-white/90 backdrop-blur rounded-xl p-6 shadow hover:shadow-lg transition">
                        <div class="text-3xl mb-2">📝</div>
                        <h3 class="font-semibold text-gray-800">Create Article</h3>
                    </a>

                    <a href="{{ route('articles.index') }}"
                       class="bg-white/90 backdrop-blur rounded-xl p-6 shadow hover:shadow-lg transition">
                        <div class="text-3xl mb-2">📋</div>
                        <h3 class="font-semibold text-gray-800">View Articles</h3>
                    </a>

                    <a href="{{ route('categories.index') }}"
                       class="bg-white/90 backdrop-blur rounded-xl p-6 shadow hover:shadow-lg transition">
                        <div class="text-3xl mb-2">🏷️</div>
                        <h3 class="font-semibold text-gray-800">Categories</h3>
                    </a>

                    <a href="{{ route('favorites.index') }}"
                       class="bg-white/90 backdrop-blur rounded-xl p-6 shadow hover:shadow-lg transition">
                        <div class="text-3xl mb-2">❤️</div>
                        <h3 class="font-semibold text-gray-800">Favorites</h3>
                    </a>

                </div>

                {{-- Latest Articles --}}
                <div class="bg-white/95 backdrop-blur rounded-xl shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                        Latest Articles
                    </h3>

                    @if(isset($latestArticles) && $latestArticles->count())
                        <div class="space-y-4">
                            @foreach($latestArticles as $article)
                                <div class="p-4 border rounded-lg hover:bg-gray-50 transition">
                                    <a href="{{ route('articles.show', $article) }}"
                                       class="text-lg font-semibold text-gray-900 hover:text-blue-600">
                                        {{ $article->title }}
                                    </a>
                                    <div class="text-sm text-gray-500 mt-1">
                                        {{ $article->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $latestArticles->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">No articles yet.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
