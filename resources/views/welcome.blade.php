<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7">
    <div class="bg-white dark:bg-gray-900 w-full">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="
            background-image: url({{ asset('image/mi.png') }});
        ">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-4xl font-bold text-white">Milliondollar Ideas</h2>

                        <p class="max-w-xl mt-3 text-gray-300">
                            Million Dollar Ideas is a platform for sharing innovative
                            project ideas. Share your creative concepts and collaborate with
                            like-minded individuals to bring your ideas to life!
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="block lg:hidden">
                            <h2 class="text-4xl font-bold text-white">
                                Milliondollar Ideas
                            </h2>
                        </div>

                        <p class="mt-3 text-gray-500 dark:text-gray-300">
                            Sign in to access your account
                        </p>
                    </div>

                    <div class="mt-8">
                        <form action="/users/authenticate" method="POST">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email
                                    Address</label>
                                <input type="email" name="email" id="email" placeholder="example@example.com"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password"
                                        class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                                </div>

                                <input type="password" name="password" id="password" placeholder="Your Password"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Sign in
                                </button>
                            </div>
                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">
                            Don&#x27;t have an account yet?
                            <a href="/register"
                                class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
