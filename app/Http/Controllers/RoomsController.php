<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Desk;
use App\Models\User;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $response = [
            'message' => 'All rooms',
            'rooms' => $rooms
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new Room([
            'desk_capacity' => $request->input('desk_capacity'),
            'size' => $request->input('size')
        ]);
        $room->save();

        $response = [
            'message' => 'Room has been created',
            'room' => $room
        ];
        return response()->json($response, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        if ($user->room_id != $id) {
            $response = [
                'message' => 'You do not have access to this room!'
            ];
            return response()->json($response, 401);
        }

        $room = Room::find($id);
        $response = [
            'message' => 'Room information',
            'room' => $room
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        $room->desk_capacity = $request->input('desk_capacity');
        $room->size = $request->input('size');
        $room->room_manager = $request->input('room_manager');
        $room->update();

        $response = [
            'message' => 'Room information updated',
            'room' => $room
        ];
        return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id)->first();
        
        $room->desks()->delete();
        $room->delete();

        $response = [
            'message' => 'Room has been deleted'
        ];
        return response()->json($response, 200);
    }

    public function assign(int $roomId, int $roomManagerId){

        $room_manager = User::findOrFail($roomManagerId);

        if ($room_manager->role != 'room_manager') {
            $room_manager->role = 'room_manager';
        }
        else {

            $response = [
                'message' => 'This user does not have such permission!'
            ];

            return response()->json($response, 400);
        }

        $room = Room::find($roomId);
        
        $room->room_manager_id = $roomManagerId;

        $response = [
            'message' => 'The room is assigned to the given user!',
            'room' => $room,
            'room_manager' => $room_manager
        ];

        return response()->json($response, 201);
    }
}
