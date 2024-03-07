<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Category;


class EventController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $events = Event::all();
        return view('events.index', compact('events', 'categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('organisation.eventForm', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'available_places' => 'required|integer|min:1',
            'type_of_reservation' => 'required|in:Automatique,par_confirmation',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->image = $imageName;
        $event->location = $request->location;
        $event->categorie_id = $request->categorie_id;
        $event->available_places = $request->available_places;
        $event->type_of_reservation = $request->type_of_reservation;
        $event->status = 'not_confirmed_yet';
        $event->user_id = Auth::id();
        $event->save();

        return view('organisation.organisationDashboard');
    }


    // public function reserve( $eventId)
    // {
    //     $event = Event::findOrFail($eventId);

    //     // Vérifie si l'utilisateur a déjà réservé une place pour cet événement
    //     // $existingReservation = Reservation::where('event_id', $event->id)
    //     //     ->where('user_id', Auth::id())
    //     //     ->first();

    //     // if ($existingReservation) {
    //     //     return redirect()->back()->with('error', 'Vous avez déjà réservé une place pour cet événement.');
    //     // }

    //     // Vérifie si des places sont disponibles pour l'événement
    //     if ($event->available_places <= 0) {
    //         return redirect()->back()->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
    //     }


    //     $reservation = new Reservation();
    //     $reservation->event_id = $event->id;
    //     $reservation->user_id = Auth::id();
    //     $reservation->save();

    //     // Met à jour le nombre de places disponibles pour l'événement
    //     $event->available_places -= 1;
    //     $event->save();

    //     return redirect()->back()->with('success', 'Votre réservation a été enregistrée avec succès.');
    // }

    // public function edit($eventId)
    // {
    //     $event = Event::findOrFail($eventId);



    //     return view('events.edit', compact('event'));
    // }

    // public function update(Request $request, $eventId)
    // {
    //     $request->validate([
    //         'title' => 'required|max:255',
    //         'description' => 'required',
    //         'location' => 'required',
    //         'date' => 'required|date',
    //         'available_places' => 'required|integer|min:0',
    //         // Ajoutez d'autres règles de validation selon vos besoins
    //     ]);

    //     $event = Event::findOrFail($eventId);

    //     // Vérifie si l'utilisateur authentifié est l'organisateur de l'événement
    //     if (Auth::id() !== $event->user_id) {
    //         return redirect()->route('events.index')->with('error', 'Vous n\'avez pas la permission de modifier cet événement.');
    //     }

    //     $event->update($request->all());

    //     return redirect()->route('events.index')->with('success', 'Événement mis à jour avec succès.');
    // }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $events = Event::where('title', 'LIKE', "%{$searchTerm}%")->get();

        return response()->json($events);
    }
    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('categorie_id');
        $events = Event::where('categorie_id', $categoryId)->get();
        return response()->json([
            'events' => $events
        ]);
    }

    // public function showReservationStatistics($eventId)
    // {
    //     $event = Event::findOrFail($eventId);

    //     // Nombre total de réservations pour cet événement
    //     $totalReservations = Reservation::where('event_id', $eventId)->count();

    //     // Autres statistiques sur les réservations pour cet événement...

    //     return view('events.reservation_statistics', [
    //         'event' => $event,
    //         'totalReservations' => $totalReservations,
    //         // Passer d'autres statistiques à la vue si nécessaire
    //     ]);
    // }


    public function paginate(Request $request)
    {
        $events = Event::paginate(10); // Par exemple, récupérez les événements paginés

        return view('events.index', compact('events'));
    }
}
