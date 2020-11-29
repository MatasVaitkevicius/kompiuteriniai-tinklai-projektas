<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan;

class DirectorController extends Controller
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
        return view('director.home');
    }

    public function adminControl(){
      $admins = User::where('user_type', 'admin')->get();
      return view('director.admin-control', compact('admins'));
    }

    public function createAdminView(){
      return view('director.create-admin');
    }

    public function roomInfo(){
      $roomCount = Room::count();
      $notVacantRoomCount = Room::where('is_vacant', '0')->count();
      $totalRoomPrice = Room::sum('room_price');
      $mostExpensiveRoom = Room::max('room_price');
      $cheapestRoom = Room::min('room_price');
      return view('director.room-info', compact('roomCount','notVacantRoomCount', 'totalRoomPrice', 'mostExpensiveRoom', 'cheapestRoom'));
  }

    public function createAdmin(Request $request){
      $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8'],
      ]);

      $user = new User();
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->password =  Hash::make($request->get('password'));
      $user->user_type = 'admin';
      $user->save();

      return redirect()->route('adminControl');
  }

  public function deleteAdmin($id)
  {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('adminControl');
  }
}
