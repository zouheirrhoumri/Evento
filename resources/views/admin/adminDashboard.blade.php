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
                    <a href="" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                    <a href="{{ route('categories') }}" class="text-sm font-semibold leading-6 text-gray-900">Manage Categories</a>
                    <a href="{{ route('admin.user') }}" class="text-sm font-semibold leading-6 text-gray-900">Manage Users</a>
                    <a href="{{ route('admin.event') }}" class="text-sm font-semibold leading-6 text-gray-900">Events</a>
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
                </div>
            </div>
        </header>

        <div class="bg-gray-50 pt-12 mt-8 sm:pt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                  EVENTO STATS
                </h2>
                <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus repellat laudantium.
                </p>
              </div>
            </div>
            <div class="mt-10 pb-12 bg-white sm:pb-16">
              <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                      <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Total users
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-indigo-600">
                          {{ $userCount }}
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Total Orgazations
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-indigo-600">
                            {{ $organizationCount }}
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Total Events
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-indigo-600">
                          {{ $eventCount }}
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>


</body>

</html>
