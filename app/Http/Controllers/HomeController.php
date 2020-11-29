<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    /**
     * Show products index view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $rooms = Room::where('is_vacant', '1')->orderBy('created_at')->get();
        return view('welcome', compact('rooms'));
    }
}