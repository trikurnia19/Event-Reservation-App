<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventBrowseController extends Controller
{
    public function index()
    {
        $events = Event::withCount('reservations')->latest()->get();

        return view('visitor.events.index', compact('events'));
    }
}

