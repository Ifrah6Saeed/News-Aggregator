<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Add Category</h2>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Category Name"
                   class="border p-2 w-full mb-3">

            <button class="bg-green-500 text-white px-4 py-2">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
