<x-layout>
    <section class="py-8 max-w-sm mx-auto">

        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>

        <x-panel>

            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input></x-form.input>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full" name="slug" id="slug" value="{{ old('slug') }}" required>

                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                        Thumbnail
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" required>

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt
                    </label>
                    <input class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" value="{{ old('excerpt') }}" required>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" require>{{ old('body') }}</textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                        Category
                    </label>
                    <select name="category_id" id="category_id">

                        @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name) }}
                        </option>
                        @endforeach

                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>

            </form>
        </x-panel>
    </section>
</x-layout>