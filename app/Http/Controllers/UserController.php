<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

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

    public function reserveRoom(){
        $rooms = Room::where('is_vacant', '1')->orderBy('created_at')->get();
        return view('user.reserve-room', compact('rooms'));
    }

    public function userReservedRooms() {
        $rooms = Room::where('is_vacant', '0')->orderBy('created_at')->get();
        return view('user.user-reserved-rooms', compact('rooms'));
    }
}