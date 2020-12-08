<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function makeReservation(Request $request, $roomId)
    {
        $reservation = new Reservation();
        $reservation->user_id = auth()->user()->id;
        $reservation->room_id = $roomId;
        $reservation->arrival_date = Carbon::parse($request['arrival_date']);
        $reservation->departure_date = Carbon::parse($request['departure_date']);
        $reservation->save();

        $room = Room::find($roomId);
        $room->reservation_count = $room->reservation_count + 1;
        $room->save();

        return redirect()->route('reservedRooms');
    }

    public function reserveRoom()
    {
        $rooms = Room::orderBy('created_at')->get();
        return view('user.reserve-room', compact('rooms'));
    }

    public function userReservedRooms()
    {
        $userId = auth()->user()->id;
        $reservations = Reservation::with('reservationRoom')->where('user_id', $userId)->get()->all();
        // foreach ($reservations as $res) {
        //     dd($res['reservationRoom']);
        // }
        return view('user.user-reserved-rooms', ['reservations' => $reservations]);
    }

    public function filterRooms(Request $request)
    {
        $request->validate([
            'arrival_date' => 'required|date|after:now',
            'departure_date' => 'required|date|after:arrival_date',
        ]);
        $arrivalDate = Carbon::parse($request['arrival_date']);
        $departureDate = Carbon::parse($request['departure_date']);
        $rooms = Room::where('room_type', $request['room_type'])
            ->whereDoesntHave('reservations', function ($q) use ($arrivalDate, $departureDate) {
                $q->where('arrival_date', '>=', $arrivalDate)->where('departure_date', '<=', $departureDate);
            })->get();
        return view('user.reserve-room', compact('rooms', 'arrivalDate', 'departureDate'));
    }
}
