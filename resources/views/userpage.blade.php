<x-layout>
    <h1>Your posts</h1>

    <div class="lg:grid lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-post-card :post="$post"/>
            @endforeach
        </div>
</x-layout>