<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use function Laravel\Prompts\search;

class EventController extends Controller
{

    public function index()
    {
        $organizerId = Auth::id(); // Assuming you are using authentication

        // Assuming you have a 'organizer_id' column in the events table
        $events = Event::where('user_id', $organizerId)->get();
        $categories = Category::all();

        return view('organisation.organisationDashboard', compact('events', 'categories'));
    }

    public function userDashboard(Request $request)
    {
        $query = Event::query()->where('Status', 'confirmed');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('title', 'like', "%$search%")
                         ->orWhere('description', 'like', "%$search%");
            });
        }
    
        if ($request->filled('category') && $request->category != 'All') {
            $category = $request->input('category');
            $query->whereHas('category', function ($subQuery) use ($category) {
                $subQuery->where('name', $category);
            });
        }
        

        $events = $query->paginate(6);
        $categories = Category::all();

        return view('user.eventList', compact('events', 'categories'));
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

        $events = Event::all();

        // Pass events and other necessary data to the view
        $categories = Category::all();

        // Redirect to the 'organisation.organisationDashboard'
        return redirect()->route('organisateur.dashboard')->with(['events' => $events, 'categories' => $categories]);
    }


    public function reserve($eventId)
    {
        $event = Event::findOrFail($eventId);


        $existingReservation = Reservation::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé une place pour cet événement.');
        }


        if ($event->available_places <= 0) {
            return redirect()->back()->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
        }

        $reservation = new Reservation();
        $reservation->event_id = $event->id;
        $reservation->user_id = Auth::id();


        if ($event->type_of_reservation === 'Automatique') {
            $reservation->status = 'valid';
        } else if ($event->type_of_reservation === 'par_confirmation') {
            $reservation->status = 'non valid';
        }

        $reservation->save();

        if ($reservation->status === 'valid') {
            $event->available_places -= 1;
            $event->save();
        }

        $successMessage = 'Votre réservation a été enregistrée avec succès.';
        if ($reservation->status === 'non valid') {
            $successMessage = 'Votre demande de réservation a été enregistrée avec succès. Elle est en attente d\'approbation de l\'organisation.';
        }

        return redirect()->back()->with('success', $successMessage);
    }

    public function generateTicket($eventId)
    {
        $user = auth()->user();

        $event = Event::findOrFail($eventId);

        $reservation = Reservation::where('user_id', $user->id)
            ->where('event_id', $eventId)
            ->where('status', 'valid')
            ->firstOrFail();

        return view('user.tickets', compact('event', 'reservation'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('organisateur.dashboard')->with('success', 'Événement supprimé avec succès.');
    }

    public function search(Request $request)
    {
        $query = Event::query()->where('Status', 'confirmed');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('title', 'like', "%$search%")
                         ->orWhere('description', 'like', "%$search%");
            });
        }
    
        if ($request->filled('category') && $request->category != 'All') {
            $category = $request->input('category');
            $query->whereHas('category', function ($subQuery) use ($category) {
                $subQuery->where('name', $category);
            });
        }
        

        $events = $query->paginate(4);
        $categories = Category::all();

        return  view('user.eventList', compact('events', 'search', 'categories'));
    }
    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('categorie_id');
        $events = Event::where('categorie_id', $categoryId)->get();
        return response()->json([
            'events' => $events
        ]);
    }

    public function showReservationStatistics($eventId)
    {
        $event = Event::findOrFail($eventId);

        // Nombre total de réservations pour cet événement
        $totalReservations = Reservation::where('event_id', $eventId)->count();

        // Autres statistiques sur les réservations pour cet événement...

        return view('events.reservation_statistics', [
            'event' => $event,
            'totalReservations' => $totalReservations,
            // Passer d'autres statistiques à la vue si nécessaire
        ]);
    }


    public function edit($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('organisation.eventEdit', compact('event'));
    }

    public function update(Request $request, $eventId)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'available_places' => 'required|integer|min:0',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $event = Event::findOrFail($eventId);

        if (Auth::id() !== $event->user_id) {
            return redirect()->route('organisateur.dashboard');
        }

        $event->update($request->all());

        return redirect()->route('organisateur.dashboard');
    }
}
