<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto">

        <h2 class="text-2xl font-bold mb-4">Categories</h2>

        <!-- Add Category Button -->
        <a href="{{ route('categories.create') }}" 
           class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded shadow hover:bg-green-700 mb-4">
            Add Category
        </a>

        <!-- Category List -->
        <ul class="mt-4 divide-y divide-gray-200">
            @forelse($categories as $category)
                <li class="py-2 flex justify-between items-center">
                    <span class="font-medium">{{ $category->name }}</span>

                    <div class="flex space-x-2">
                        <!-- Edit -->
                        <a href="{{ route('categories.edit', $category) }}" 
                           class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <p class="text-gray-500">No categories available.</p>
            @endforelse
        </ul>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $categories->links() }}
        </div>

    </div>
</x-app-layout>
