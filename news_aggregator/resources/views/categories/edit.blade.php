<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Category</h2>

        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $category->name }}"
                   class="border p-2 w-full mb-3">

            <button class="bg-blue-500 text-white px-4 py-2">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
