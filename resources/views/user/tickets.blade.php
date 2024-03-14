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
    <div class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-2/3 px-4 mb-8 lg:mb-0">
                    <img class="w-full rounded-lg shadow-lg" src="{{ asset('images/' . $event->image) }}" alt="Concert Image">
                </div>
                <div class="w-full lg:w-1/3 px-4">
                    <h1 class="text-4xl font-bold mb-4">{{$event->title}}</h1>
                    <p class="text-lg mb-6">{{$event->description}}</p>
                    <div class="mb-6">
                        <p class="text-xl font-bold mb-2">When:</p>
                        <p class="text-lg">{{$event->date}}</p>
                    </div>
                    <div class="mb-6">
                        <p class="text-xl font-bold mb-2">Where:</p>
                        <p class="text-lg">{{$event->location}}</p>
                    </div>
                    <div class="mb-6">
                        <p class="text-xl font-bold mb-2">reservation status:</p>
                        <p class="text-lg">{{$reservation->status}}</p>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>