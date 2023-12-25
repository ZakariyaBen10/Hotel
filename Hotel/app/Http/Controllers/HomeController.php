<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;


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
                return view('admin.home');
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
}
