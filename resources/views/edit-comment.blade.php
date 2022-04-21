<x-layout>
    <section>
        <h1 class="font-bold text-3xl">Edit Comment</h1>

        <form action="/user/comments/{{ $comment->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
            
                <x-textarea name="body" id="body" required>{{ $comment->body }}</x-textarea>
                @error('body')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <x-button type="submit">Update Comment</x-button>

            </div>
        </form>
    </section>
</x-layout>