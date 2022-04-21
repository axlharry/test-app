<x-layout>
    <section>
        <h1 class="font-bold text-3xl">Edit Comment</h1>

        <form action="/user/comments/{{ $comment->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="block">
                <div class="mt-6">
                    <x-textarea name="body" id="body" required>{{ $comment->body }}</x-textarea>
                    @error('body')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6">
                    <x-button type="submit">Update Comment</x-button>
                </div>
            </div>
        </form>
    </section>
</x-layout>