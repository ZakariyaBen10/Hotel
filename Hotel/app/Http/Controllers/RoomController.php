<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class RoomController extends Controller
{
   public function addview()
    {

        if(Auth::id())
        {
            if(Auth::user()->typeUser=='1')
            {
                return view('admin.add_room');
            } else
            {
            return redirect()->back();
            }
        }
        else
        {
        return redirect('login');
        }
    }


    public function upload(Request $request)
    {
    $room = new room;

    $image = $request->file;

    $imagename=time().'.'.$image->getClientoriginalExtension();

    $request->file->move('roomimage', $imagename);

    $room->image=$imagename;


    $room->roomNumber=$request->number;
    $room->persons=$request->persons;
    $room->description=$request->description;
    $room->classRoom=$request->classRoom;
    $room->price=$request->pricenumber;

    $room->save();

    return redirect()->back()->with('message', 'Room was added successfuly');
    }



   
}
