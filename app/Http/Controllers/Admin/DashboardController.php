<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::withCount('reservations')->latest()->get();
        $recentReservations = Reservation::with(['user', 'event'])->latest()->get();

        return view('admin.dashboard', compact('events', 'recentReservations'));
    }
}
