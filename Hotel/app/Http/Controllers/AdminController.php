<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{

    public function addview()
    {
    return view('admin.add_room');
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
