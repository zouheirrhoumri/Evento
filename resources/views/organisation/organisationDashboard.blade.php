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
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Product</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Features</a>
                    <a href="{{ route('reservations.non-valid') }}" class="text-sm font-semibold leading-6 text-gray-900">Reservations</a>
                    <a href="{{ route('event.form') }}"
                        class="w-4/6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg ml-2 text-sm px-3 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                       Post An Event
                        </a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
            
                        <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
               
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                                <a href="route('reservations.non-valid')"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Reservations</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                            </div>
                            <div class="py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                    in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        
        <div class="mt-24 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none mb-6">
            @foreach ($events as $event)
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="{{ asset('images/' . $event->image) }}"
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

                            @if (auth()->check() && auth()->user()->id === $event->user_id)
                                <form method="POST" action="{{ route('events.destroy', ['event' => $event->id]) }}">
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
    {{ $events->links() }}

</body>

</html>
