<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function form()
    {
        return view('admin.checkin.form');
    }

    public function process(Request $request)
    {
        $request->validate([
            'ticket_code' => 'required|string',
        ]);

        $reservation = Reservation::with('user', 'event')
            ->where('ticket_code', $request->ticket_code)
            ->first();

        if (! $reservation) {
            return back()->with('error', 'Ticket not found.');
        }

        return view('admin.checkin.result', compact('reservation'));
    }
}

