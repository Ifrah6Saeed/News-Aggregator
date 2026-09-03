<x-app-layout>

    {{-- Background Wrapper --}}
    <div class="min-h-screen bg-cover bg-center relative"
         style="background-image: url('https://i.pinimg.com/736x/81/55/12/8155122ec81e243fc0f4103747ed2a6a.jpg');">

        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Content --}}
        <div class="relative py-14 px-4">
            <div class="max-w-3xl mx-auto">

                {{-- Header --}}
                <div class="mb-8 text-white">
                    <h1 class="text-3xl font-bold">Create New Article</h1>
                    <p class="text-gray-300 mt-1">
                        Write and publish your content
                    </p>
                </div>

                {{-- Card --}}
                <div class="bg-white/95 backdrop-blur rounded-2xl shadow-2xl p-8">

                    <form method="POST" action="{{ route('articles.store') }}" class="space-y-6">
                        @csrf

                        {{-- Title --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Article Title
                            </label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                   placeholder="Enter article title"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg text-lg
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                          transition @error('title') border-red-500 @enderror"
                                   required>
                        </div>

                        {{-- Description --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Short Description
                            </label>
                            <textarea name="description" rows="3"
                                      placeholder="Brief summary of the article"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                             focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                             transition @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        </div>

                        {{-- Content --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Content
                            </label>
                            <textarea name="content" rows="6"
                                      placeholder="Write your article here..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                             focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                             transition @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                        </div>

                        {{-- Category --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Category
                            </label>
                            <select name="category_id"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                           transition @error('category_id') border-red-500 @enderror"
                                    required>
                                <option value="">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Actions --}}
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <button type="submit"
                                    class="flex-1 bg-blue-600 hover:bg-blue-700
                                           text-white py-3 rounded-lg font-semibold
                                           shadow hover:shadow-lg transition
                                           focus:ring-4 focus:ring-blue-300">
                                Publish Article
                            </button>

                            <a href="{{ route('articles.index') }}"
                               class="flex-1 bg-gray-800 hover:bg-gray-900
                                      text-white py-3 rounded-lg font-semibold
                                      shadow hover:shadow-lg transition text-center
                                      focus:ring-4 focus:ring-gray-300">
                                Back
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
