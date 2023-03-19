<!DOCTYPE html>

<head>
    <title>Laravel From Scratch Blog</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/"">
                    <img src="/image/logoidea.png" alt="Laracasts Logo" width="60" class="mx-auto" />
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex w-80 justify-between mx-auto lg:mx-0">
                <a href="/" class="text-xs font-bold uppercase">Home Page</a>
                <a href="/posts/manage" class="text-xs font-bold uppercase">Manage Your Posts</a>
                <div class="text-xs font-bold">
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="uppercase">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        {{ $slot }}

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    @livewireScripts
</body>
