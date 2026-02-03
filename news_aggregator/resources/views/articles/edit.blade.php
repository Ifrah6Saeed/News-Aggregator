<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto bg-white shadow rounded-lg">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Article</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('articles.update', $article) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" placeholder="Article Title"
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <textarea name="description" rows="3" placeholder="Short Description" 
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $article->description) }}</textarea>
            </div>

            <div>
                <textarea name="content" rows="6" placeholder="Full Content" 
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('content', $article->content) }}</textarea>
            </div>

            <div>
                <select name="category_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Save Button -->
            <div class="flex gap-4 mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200">
                    Save Changes
                </button>

                <a href="{{ route('articles.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 text-center">
                    Cancel
                </a>
            </div>
        </form>

        <!-- AFTER EDIT: VIEW / EDIT / DELETE BUTTONS -->
        <div class="flex flex-wrap gap-4 mt-8 justify-center">
           

            <a href="{{ route('articles.edit', $article) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200">
               ✏️ Edit Article
            </a>

            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200">
                    🗑️ Delete Article
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
