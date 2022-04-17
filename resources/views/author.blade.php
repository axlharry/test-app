<x-layout>
<article>
        <h1 class="text-4xl font-bold">{{ $posts[0]->author->name }}</h1>

        <h2 class="text-xl py-6">Latest posts by {{ $posts[0]->author->name }}:</h2>



            <div class="lg:grid lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-post-card :post="$post"/>
            @endforeach
        </div>

    </article>

</x-layout>