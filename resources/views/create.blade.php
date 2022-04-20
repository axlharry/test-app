<x-layout>
    <section>
        <h1 class="font-bold text-3xl">Add New Post</h1>

        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">
                    Title
                </label>
                <x-input type="text" name="title" id="title" value="{{ old('title') }}" required></x-input>
                @error('title')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label for="slug">
                    Slug
                </label>
                <x-input type="text" name="slug" id="slug" value="{{ old('slug') }}" required></x-input>
                @error('slug')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label for="body">
                    Body
                </label>
                <textarea name="body" id="body" required>{{ old('body') }}</textarea>
                @error('body')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label for="image">
                    Image
                </label>
                <x-input type="file" name="image" id="image" value="{{ old('image') }}" required></x-input>
                @error('image')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label for="alt">
                    Image Alt Text
                </label>
                <x-input type="text" name="alt" id="alt" value="{{ old('alt') }}" required></x-input>
                @error('alt')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <x-button type="submit">Create post</x-button>

            </div>
        </form>
    </section>
</x-layout>