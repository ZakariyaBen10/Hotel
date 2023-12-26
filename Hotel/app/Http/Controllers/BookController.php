<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;


class BookController extends Controller
{

    public function showDetail($id)
    {

        $room=room::find($id);
        return view('user.detail',compact('room'));
    }

}
