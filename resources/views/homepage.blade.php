<x-layout>
    <main>
        <div class="lg:grid lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-post-card :post="$post"/>
            @endforeach
            {{ $posts->links() }}
        </div>
    </main>
</x-layout>
