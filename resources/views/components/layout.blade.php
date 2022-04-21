<!DOCTYPE html>

<title>Stock O'Clock</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">


<body>
    <section class="px-6 py-8">
        <nav>
            <div class="pb-6 px-2 flex md:justify-between items-center">
                <a href="/">
                    <img src="/images/stockoclock-logo.png" alt="Stock O'Clock Logo" width="280">
                </a>
                <div class="m-left-auto align-right flex">
                    @guest
                    <a href="/login">Log in</a>
                    <a href="/register" class="ml-6">Register</a>
                    @endguest
                    @auth
                    <span>{{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="text-red-500 ml-6">Log out</button>
                    </form>
                    <a href="/user/posts/create">
                        <x-button class="ml-6">Add a Post</x-button>
                    </a>
                    @endauth
                </div>
            </div>
        </nav>

        {{ $slot }}

        <footer class="border-t-2 border-gray text-center py-16 px-10 mt-16">
            <p class="text-gray-400">Posts on this blog are not financial advice.</p>
        </footer>
    </section>

</body>