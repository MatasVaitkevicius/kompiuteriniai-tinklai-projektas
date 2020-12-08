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

    public function getRooms()
    {
        $rooms = Room::orderBy('created_at')->get();
        return view('admin.rooms', compact('rooms'));
    }


    public function createRoomView(Request $request)
    {
        return view('admin.create-room');
    }

    public function createRoom(Request $request)
    {
        $request->validate([
            'room_price' => 'required|numeric|gt:0',
        ]);
        $room = new Room();
        $room->room_type = $request->get('room_type');
        $room->wifi = $request->get('wifi');
        $room->tv = $request->get('tv');
        $room->room_price = $request->get('room_price');
        $room->img_url = $request->get('img_url');
        $room->reservation_count = 0;
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
