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
            <img src="/images/wall-street.jpg" alt="Wall Street" width="840"class="pt-6">
        </div>
<div>
    <p class="text-xl py-6">
    {{ $post->body }}
</p>
</div>
    </article>
    <section>


    <h2>Comments</h2>
    @guest
                    <span><a href="/login">Log in</a> or <a href="/register">Register</a> to add a comment.</span>
                @endguest
    @auth
    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="flex">
        @csrf 
<div>
        <img src="https://i.pravatar.cc/100" alt="Profile Picture">
        </div>
        <div>
            <textarea name="body" cols="30" rows="10" placeholder="Add a comment..."></textarea>
        </div>
<button type="submit">Submit comment</button>
    </form>
    @endauth
    @foreach ($post->comments as $comment)
        <article class="flex">
            <div>
                <img src="https://i.pravatar.cc/100" alt="Profile Picture">
            </div>

            <div>
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <span><time>{{ $comment->created_at->diffForHumans() }}</time></span>
            </div>

            <p>{{ $comment->body }}</p>
        </article>
        @endforeach
    </section>

    <a href="/" class="text-green-500 text-base">Go to home</a>

</x-layout>
