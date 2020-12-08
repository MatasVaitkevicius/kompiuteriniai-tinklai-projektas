<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show products index view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $rooms = Room::orderBy('created_at')->get();
        return view('welcome', compact('rooms'));
    }

    public function filter(Request $request)
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
        return view('welcome', compact('rooms', 'arrivalDate', 'departureDate'));
    }
}
