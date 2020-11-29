<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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

    public function index()
    {
        return view('admin.home');
    }

    public function getRooms(){
        $rooms = Room::orderBy('created_at')->get();
        return view('admin.rooms', compact('rooms'));
    }


    public function createRoomView(Request $request){
        return view('admin.create-room');
    }

    public function createRoom(Request $request){
        $request->validate([
            'arrival_time' => 'required|date|after:now',
            'departure_time' => 'required|date|after:arrival_time',
            'room_price' => 'required|numeric|gt:0',
        ]);

        $room = new Room();
        $room->arrival_time = $request->get('arrival_time');
        $room->departure_time = $request->get('departure_time');
        $room->room_type = $request->get('room_type');
        $room->is_vacant = $request->get('is_vacant');
        $room->wifi = $request->get('wifi');
        $room->tv = $request->get('tv');
        $room->room_price = $request->get('room_price');
        $room->reservation_count = 1;
        $room->save();

        return redirect()->route('rooms');
    }

    public function deleteRoom($id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('rooms');
    }

    public function viewUsers()
    {
        $users = User::where('user_type', 'user')->get();
        return view('admin.view-users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('viewUsers');
    }
}
