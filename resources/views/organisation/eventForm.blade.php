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
    <!-- component -->
    <!-- Code on GiHub: https://github.com/vitalikda/form-floating-labels-tailwindcss -->
    <style>
        .-z-1 {
            z-index: -1;
        }

        .origin-0 {
            transform-origin: 0%;
        }

        input:focus~label,
        input:not(:placeholder-shown)~label,
        textarea:focus~label,
        textarea:not(:placeholder-shown)~label,
        select:focus~label,
        select:not([value='']):valid~label {
            /* @apply transform; scale-75; -translate-y-6; */
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            --tw-scale-x: 0.75;
            --tw-scale-y: 0.75;
            --tw-translate-y: -1.5rem;
        }

        input:focus~label,
        select:focus~label {
            /* @apply text-black; left-0; */
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
            left: 0px;
        }
    </style>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <h1 class="text-2xl font-bold mb-8">Form With Floating Labels</h1>
            <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="title" placeholder="" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Enter
                        name</label>
                </div>

                <div class="relative z-0 w-full mt-8 mb-5">
                    <textarea type="text" name="description" placeholder="Description" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2
                         appearance-none focus:outline-none focus:ring-0
                          focus:border-black border-gray-200"> </textarea>
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Event's
                        Description</label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="date" name="date" placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="date" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Enter email
                        address</label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="location" placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="location"
                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Location</label>
                </div>

                <fieldset class="relative z-0 w-full p-px mb-5">
                    <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Choose a Reservation Type
                    </legend>
                    <div class="block pt-3 pb-2 space-x-4">
                        <label>
                            <input type="radio" name="type_of_reservation" value="Automatique"
                                class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" />
                            Automatique
                        </label>
                        <label>
                            <input type="radio" name="type_of_reservation" value="par_confirmation"
                                class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" />
                            Par Confirmation
                        </label>
                    </div>
                </fieldset>

                <div class="relative z-0 w-full mb-5">
                    <input type="file" name="image" accept="image/*" placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="image" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">choose an
                        image</label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <select name="categorie_id" value=""
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Select an
                        option</label>
                </div>



                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="available_places" placeholder=" "
                        class="pt-3 pb-2 pr-12 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="duration"
                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">places</label>
                </div>

                <button type="submit"
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none">
                    Post
                </button>
            </form>
        </div>
    </div>


</body>

</html>
