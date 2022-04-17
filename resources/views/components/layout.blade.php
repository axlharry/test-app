<!DOCTYPE html>

<title>My Blog</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">


<body>
    <section class="px-6 py-8">
        <nav class="pb-6">
            <div>
                <a href="/">
                    <img src="/images/stockoclock-logo.png" alt="Stock O'Clock Logo" width="280">
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="border-t-2 border-gray text-center py-16 px-10 mt-16">
            <p class="text-gray-400">Posts on this blog are not financial advice.</p>
        </footer>
    </section>

</body>
