<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;



class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id()) 
        {
            if(Auth::user()->typeUser=='0') 
            {
                $room = room::all();

                return view('user.home', compact('room'));
            } 
            else
            {
                return view('admin.add_room');
            }
        }
        else
        {
            return redirect()->back();
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

    public function myreservation()
    {


        if(Auth::id())
        {
            $userid= Auth::user()->id;

            $book = reservation::where('user_id', $userid)->get();
            return view('user.my_reservation', compact('book'));
        }
        else
        {
            return redirect()->back();
        }
    }



    public function cancel_book($id)
    {
    $data=reservation::find($id);

    $data->delete();

    return redirect()->back()->with('message', 'The booking has been canceled !');
    }


public function contact()
{
                return view('user.contact');
}
}
