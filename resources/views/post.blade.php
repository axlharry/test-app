<x-layout>
    <article>
        <h1 class="text-4xl font-bold">{{ $post->title }}</h1>

        <h3 class="font-bold hover:text-green-500 text-lg">
            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
        </h3>

        <span class="text-gray-400 text-base">
            Published <time>{{ $post->created_at->diffForHumans() }}</time>
        </span>

        <div>
            <a href="/user/posts/{{ $post->id }}/edit" class="text-green-500">Edit</a>

            <form method="post" action="/user/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')

                <button class="text-red-500">Delete</button>
            </form>
        </div>
        <div>
            <img src="/{{ $post->image }}" alt="{{ $post->alt }}" width="840" class="pt-6">
        </div>
        <div>
            <p class="text-xl py-6">
                {{ $post->body }}
            </p>
        </div>
    </article>
    <section>


        <h2 class="font-bold text-2xl">Comments</h2>
        @guest
        <span><a href="/login" class="text-green-500">Log in</a> or <a href="/register" class="text-green-500">Register</a> to add a comment.</span>
        @endguest
        @auth
        <x-box>
            <form method="post" action="/posts/{{ $post->slug }}/comments" class="flex">
                @csrf
                <div>
                    <img src="{{ Auth::user()->avatar->image }}" alt="Profile Picture" class="rounded-full">
                </div>
                <div>
                    <x-textarea name="body" rows="2" placeholder="Add a comment..." required class="ml-6"></x-textarea>

                    @error('body')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="ml-6"><x-button type="submit">Submit comment</x-button></div>
            </form>
        </x-box>
        @endauth
        @foreach ($post->comments as $comment)
        <x-box>
            <article class="flex">
                <div>
                    <img src="{{ $comment->author->avatar->image }}" alt="Profile Picture" class="rounded-full">
                </div>

                <div class="ml-6">
                    <h3 class="font-bold">{{ $comment->author->name }}</h3>
                    <span><time>{{ $comment->created_at->diffForHumans() }}</time></span>
                </div>

                <p class="ml-6 text-xl">{{ $comment->body }}</p>
                <div class="align-right ml-12">
                    <a href="/user/comments/{{ $comment->id }}/edit" class="text-green-500">Edit</a>
                    <form method="post" action="/user/comments/{{ $comment->id }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500">Delete</button>
                    </form>
                </div>
            </article>
        </x-box>
        @endforeach
    </section>

</x-layout>