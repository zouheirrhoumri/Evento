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
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Marketplace</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Company</a>
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
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
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

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Approve Events</h1>
                    
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <h1 class="ml-8 mb-6 font-black text-lg">ALL EVENTS :</h1>

        </div>
        <section class="pt-20 lg:pt-[120px] pb-10 lg:pb-20 ">
            <div class="container">

                <div class="flex flex-wrap gap-2 mx-8">
                    @foreach ($events as $event)
                        <div class="w-full md:w-1/2 xl:w-1/3 px-4 border-2 rounded-sm">
                            <div class="bg-white rounded-lg overflow-hidden mb-10">
                                <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}">
                                <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                                    <h3>
                                        <a href="javascript:void(0)"
                                            class="
                               font-semibold
                               text-dark text-xl
                               sm:text-[22px]
                               md:text-xl
                               lg:text-[22px]
                               xl:text-xl
                               2xl:text-[22px]
                               mb-4
                               block
                               hover:text-primary
                               ">
                                            {{ $event->title }}
                                        </a>
                                    </h3>
                                    <p class="text-base text-body-color leading-relaxed mb-7">
                                        {{ $event->description }}
                                    </p>
                                    <p class="text-base text-body-color leading-relaxed mb-2">
                                        Location : {{ $event->location }}
                                    </p>
                                    <p class="text-base text-body-color leading-relaxed mb-2">
                                        Date : {{ $event->date }}
                                    </p>
                                    <p class="text-base text-body-color leading-relaxed mb-2">
                                        available seats : {{ $event->available_places }}
                                    </p>
                                    <a href="javascript:void(0)"
                                        class="
                            inline-block
                            py-2
                            px-7
                            border border-[#E5E7EB]
                            rounded-full
                            text-base text-body-color font-medium hover:border-primary                          
                            ">{{ $event->category->name }}
                                    </a>
                                </div>
                                @if ($event->Status == 'not_confirmed_yet')
                                <form action="{{ route('events.updateStatus', $event->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Ajoutez cette ligne pour spécifier la méthode PUT -->
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Confirmer
                                    </button>
                                </form>
                              @endif
                               
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </section>
    </div>


</body>

</html>
