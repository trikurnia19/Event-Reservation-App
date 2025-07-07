<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Event $event)
    {
        $user = auth()->user();

        $alreadyReserved = Reservation::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyReserved) {
            return redirect()->back()->with('error', 'You have already reserved this event.');
        }

        if ($event->reservations()->count() >= $event->quota) {
            return redirect()->back()->with('error', 'Event quota is full.');
        }

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'ticket_code' => strtoupper(Str::random(8)),
            'is_checked_in' => false,
        ]);

        return redirect()->route('visitor.tickets.my')->with('success', 'Reservation successful! Your ticket code: ' . $reservation->ticket_code);
    }

    public function myTicket()
    {
        $user = auth()->user();

        $reservations = Reservation::with('event')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('visitor.tickets.index', compact('reservations'));
    }

}
