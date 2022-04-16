<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <p>
            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
        </p>
        <span>Published <time> {{ $post->created_at->diffForHumans() }}</time></span>
        </article>
    @endforeach
    <div class="lg:grid lg:grid-cols-3">
    <x-post-card/>
    <x-post-card/>
    <x-post-card/>
    </div>
</x-layout>
