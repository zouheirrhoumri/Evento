<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="bg-white">
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex px-2 lg:px-0">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-8 w-auto"
                                src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                            <img class="hidden lg:block h-8 w-auto"
                                src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg"
                                alt="Workflow">
                        </div>
                        <div class="hidden lg:ml-6 lg:flex lg:space-x-8">
                            <a href="#"
                                class="text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium">Dashboard</a>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 text-sm font-medium">My Tickets</a>
                           
                        </div>
                    </div>
                    <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end ">
                        <div class="max-w-md w-full lg:max-w-xl flex items-center">
                            <label for="search" class="sr-only">Search</label>
                            <form action="{{ route('events.index') }}" method="GET" class="relative flex gap-2 items-center">
                                
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input value="{{ isset($search) ? $search : '' }}" name="search"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Search" type="search">
                                <select id="category" name="category" class="block w-full pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="All">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                class="w-4/6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg ml-2 text-sm px-3 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Apply filter
                                </button>
                            </form>
                            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                        
                                    <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center lg:hidden">
                        <!-- Mobile menu button (You can keep this if you want, but it won't toggle anything without JavaScript) -->
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-controls="mobile-menu">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Mobile menu (You can keep this if you want, but it won't toggle anything without JavaScript) -->
            <div id="mobile-menu" class="lg:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-indigo-700">Dashboard</a>
                    <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-800">Team</a>
                    <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-800">Projects</a>
                    <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-800">Calendar</a>
                </div>
            </div>
        </nav>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-green-100 border border-green-400 text-red-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">NB!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif


        <section class=" ">

            <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">

                <div class="absolute inset-0">
                    <div class="bg-white h-1/3 sm:h-2/3"></div>
                </div>
                <div class="relative max-w-7xl mx-auto">
                    <div class="text-center">
                        <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                            From the blog
                        </h2>
                        <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus
                            atque,
                            ducimus sed.
                        </p>
                    </div>

                    <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                        @foreach ($events as $event)
                            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                                <div class="flex-shrink-0">
                                    <img class="h-48 w-full object-cover"
                                        src="{{ asset('images/' . $event->image) }}"
                                        alt="">
                                </div>
                                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-indigo-600">
                                            <a href="#" class="hover:underline">
                                                {{ $event->category->name }}
                                            </a>
                                        </p>
                                        <a href="#" class="block mt-2">
                                            <p class="text-xl font-semibold text-gray-900">
                                                {{ $event->title }}
                                            </p>
                                            <p class="mt-3 text-base text-gray-500">
                                                {{ $event->description }}
                                            </p>
                                        </a>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                Location: <span class="text-indigo-600">{{ $event->location }}</span>
                                            </p>
                                            <p class="text-sm font-medium text-gray-900">
                                                Date: <span class="text-indigo-600">{{ $event->date }}</span>
                                            </p>
                                            <p class="text-sm font-medium text-gray-900">
                                                Available Places: <span
                                                    class="text-indigo-600">{{ $event->available_places }}</span>
                                            </p>
                                        </div>



                                    </div>

                                    <div class="flex justify-between mt-4">
                                        @if (auth()->check() && auth()->user()->id === $event->user_id)
                                            <a href="{{ route('events.edit', ['eventId' => $event->id]) }}"
                                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                                Modifier
                                            </a>
                                        @endif

                                        @if (auth()->check() && auth()->user()->role === 'utilisateur')
                                            <form method="POST"
                                                action="{{ route('events.reserve', ['eventId' => $event->id]) }}">
                                                @csrf
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Réserver
                                                </button>
                                            </form>
                                        @endif

                                        @if (auth()->check() && auth()->user()->role === 'utilisateur')
                                            <form method="
                                            POST"
                                                action="{{ route('event.ticket', ['eventId' => $event->id]) }}">
                                                @csrf
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                   Get Ticket
                                                </button>
                                            </form>
                                        @endif

                                        @if (auth()->check() && auth()->user()->id === $event->user_id)
                                            <form method="POST"
                                                action="{{ route('events.destroy', ['event' => $event->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Supprimer
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            {{ $events->withQueryString()->links() }}
        </section>
    </div>


</body>

</html>
