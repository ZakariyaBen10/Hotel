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


    public function add_contactform(Request $request)
    {
        $contact = new contact;

        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->message=$request->message;

        $contact->save();

        return redirect()->back()->with('message', 'You\'re message has been send !');



    }


    public function about()
    {
        return view('user.about');
}

}
