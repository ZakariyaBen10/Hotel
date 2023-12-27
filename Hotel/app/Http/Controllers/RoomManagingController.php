<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class RoomManagingController extends Controller
{
    public function rooms()
    {
        $data=room::all();

        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.rooms', compact('data'));
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

    public function delete_room($id)
    {
        $data=room::find($id);

            $data->delete();


        return redirect()->back()->with('message', "The room number $data->roomNumber has been deleted");
    }


    public function editroom($id)
    {

        $data=room::find($id);


        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.edit_room',compact('data'));
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

    public function changing_room(Request $request,$id)
    {

        $room=room::find($id);

    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('roomimage', $imagename);
        $room->image = $imagename;
    }
    
        $room->roomNumber=$request->number;
        $room->persons=$request->persons;
        $room->description=$request->description;
        $room->classRoom=$request->classRoom;
        $room->price=$request->pricenumber;

        $room->save();

        return redirect()->back()->with('message', "The room number $room->roomNumber has been Updated");

    }

}
