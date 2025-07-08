<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class PublicCheckinController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'ticket_code' => 'required|string',
        ]);

        $reservation = Reservation::where('ticket_code', $request->ticket_code)->first();

        if (!$reservation) {
            return back()->with('error', 'Ticket not found.');
        }

        if ($reservation->is_checked_in) {
            return back()->with('error', 'Ticket has already been checked in.');
        }

        $reservation->update(['is_checked_in' => true]);

        return back()->with('success', 'Ticket successfully checked in.');
    }
}

