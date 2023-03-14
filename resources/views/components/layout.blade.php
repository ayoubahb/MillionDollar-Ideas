{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MD IDEA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <nav class="w-full h-16 flex items-center justify-between fixed top-0">
        <div class="left flex items-center justify-center ml-5">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('image/logoidea.png') }}" class="w-16 cursor-pointer my-1 mx-0" />
                </a>
            </div>
        </div>

        <div class="right flex items-center ml-2 mx-5">
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-door-closed"></i> Logout
                </button>
            </form>
            <img src="{{ asset('image/user.png') }}"
                class="w-8 h-8 object-cover object-center ml-2 cursor-pointe rounded-full" />
        </div>
    </nav>

    <div class="main flex mt-14 mx-auto justify-center">
        {{ $slot }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html> --}}


<!DOCTYPE html>

<title>Laravel From Scratch Blog</title>
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
@vite('resources/css/app.css')
@vite('resources/js/app.js')

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
</body>
