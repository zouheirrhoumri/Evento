<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des réservations</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Liste des réservations</h1>

        @if ($reservations->isEmpty())
            <p>Aucune réservation trouvée.</p>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->event->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->status }}</td>

                            <td class="px-6 py-4 whitespace-nowrap">

                                <form action="{{ route('reservations.confirm', ['eventId' => $reservation->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Confirmer</button>
                                </form>



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>
