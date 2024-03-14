<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // public function showNonValidReservations()
    // {
    //     $nonValidReservations = Reservation::where('status', 'non valid')->get();
    //     return view('organisation.reservation', ['reservations' => $nonValidReservations]);
    // }

    public function showNonValidReservations()
    {
        // Assuming you're fetching events created by the organization
        $events = auth()->user()->events;

        // Fetch only non-valid reservations related to each event
        $nonValidReservations = collect();

        foreach ($events as $event) {
            $nonValidReservations = $nonValidReservations->merge(
                $event->reservations->where('status', 'non valid')
            );
        }

        return view('organisation.reservation', ['reservations' => $nonValidReservations]);
    }


    public function confirmReservation($eventId)
    {
        $reservation = Reservation::findOrFail($eventId);

        $reservation->update(['status' => 'valid']);

        $event = Event::findOrFail($reservation->event_id);
        $event->available_places -= 1;
        $event->save();

        return redirect()->back()->with('success', 'Réservation confirmée avec succès.');
    }
    
    
}