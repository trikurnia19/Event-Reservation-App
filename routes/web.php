<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\Visitor\DashboardController as VisitorDashboard;
use App\Http\Controllers\User\EventBrowseController;
use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\Admin\EventController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('/checkin', [CheckinController::class, 'form'])->name('checkin.form');
    Route::post('/checkin', [CheckinController::class, 'process'])->name('checkin.process');

});

Route::middleware(['auth', 'role:visitor'])->prefix('visitor')->name('visitor.')->group(function () {
    Route::get('/dashboard', fn() => view('visitor.dashboard'))->name('dashboard');

    Route::get('/events', [EventBrowseController::class, 'index'])->name('events.index');

    Route::post('/events/{event}/reserve', [ReservationController::class, 'store'])->name('events.reserve');

    Route::get('/my-ticket', [ReservationController::class, 'myTicket'])->name('tickets.my');
});

Route::post('/checkin/{reservation}/mark', function (Reservation $reservation) {
    $reservation->update(['is_checked_in' => true]);

    return redirect()->route('admin.checkin.form')->with('success', 'Ticket has been checked-in!');
})->middleware(['auth', 'role:admin'])->name('checkin.mark');


require __DIR__ . '/auth.php';
