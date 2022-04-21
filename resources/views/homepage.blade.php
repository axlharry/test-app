<x-layout>
    <main>
        <div class="lg:grid lg:grid-cols-3 content-center">
            @foreach ($posts as $post)
            <x-post-card :post="$post" />
            @endforeach
        </div>
        {{ $posts->links() }}
    </main>
</x-layout>