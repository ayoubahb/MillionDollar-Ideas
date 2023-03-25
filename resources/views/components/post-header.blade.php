@props(['categories'])
<header class="max-w-xl mx-auto mt-20 text-center">
    <div class=" lg:space-y-0 lg:space-x-4 mt-8 flex gap-2 justify-center">
        <!--  Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl h-10 w-52">

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="bg-transparent py-2 pl-3 pr-9 text-sm font-semibold text-left w-full" type="button">
                Categories
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 w-52 bg-white">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    @foreach ($categories as $category)
                        <li>
                            <a href="/?category={{ $category->name }}" class="block pl-3 text-left py-1 text-black dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px" width="22"
                height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                    <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                    </path>
                </g>
            </svg>
        </div>
        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2 w-52 h-10 ">
            <form action="/">
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm border-0 focus:outline-none" />
            </form>
        </div>
    </div>
</header>
