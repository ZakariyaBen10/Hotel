<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
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


    public function booking()
    {
        $data=reservation::all();

        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.booking', compact('data'));
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


    public function approved_booking($id)
    {
        $data=reservation::find($id);
        
        $data->status='Approved';

        $data->save();

    return redirect()->back()->with('message', "The booking on room nr $data->roomNumber by $data->name has been approved");

    }


    public function denied_booking($id)
    {
        $data=reservation::find($id);
        
        $data->status='Denied';

        $data->save();

    return redirect()->back()->with('message', "The booking on room nr $data->roomNumber by $data->name has been Denied");

    }

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


public function users_rights()
{
        $data=user::all();


        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.user_managment', compact('data'));
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

public function promote_user(Request $request,$id)
{

        $user=user::find($id);

        $user->typeUser = 1;

        $user->save();

        return redirect()->back()->with('message', "The user $user->email has been promoted to admin !");
}


public function discard_user(Request $request,$id)
{

        $user=user::find($id);

        $user->typeUser = 0;

        $user->save();

        return redirect()->back()->with('message', "The user $user->email has been discarded to user !");
}



}
