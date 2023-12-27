<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Contact;



class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id()) 
        {
            if(Auth::user()->typeUser=='1') 
            {
                return view('admin.add_room');

            } 
            else
            {

                $room = room::all();

                return view('user.home', compact('room'));

            }
        }
        else
        {
                            $room = room::all();

                return view('user.home', compact('room'));

        }
    }

    public function index()
    {

        if(Auth::id())
        {
        return redirect('home');
        }
        else
        {
            $room = room::all();
            return view('user.home', compact('room'));
        }

    }


    public function about()
    {
        return view('user.about');
}

}
