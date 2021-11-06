<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Desk;
use App\Models\Room;
use App\Models\User;

class DesksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth.role:admin');
    }


    public function index()
    {
        $desks = Desk::all();
        $response = [
            'message' => 'All desks',
            'desks' => $desks
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
        $desk = new Desk([
            'room_id' => $request->input('room_id'),
            'price' => $request->input('price'),
            'size' => $request->input('size'),
            'position' => $request->input('position'),
            'is_taken' => $request->input('is_taken')
        ]);
        $desk->save();

        $response = [
            'message' => 'Desk has been created',
            'desk' => $desk
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
                'msg' => 'You haven\'t rent the desk yet.'
            ];

            return response()->json($response, 401);
        }

        $desk = Desk::find($id);
        $response = [
            'message' => 'Desk information',
            'desk' => $desk
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
        $desk = Desk::find($id);

        $desk->room_id = $request->input('room_id');
        $desk->price = $request->input('price');
        $desk->size = $request->input('size');
        $desk->position = $request->input('position');
        $desk->is_taken = $request->input('is_taken');
        $desk->update();

        $response = [
            'message' => 'Desk information updated',
            'desk' => $desk
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
        $desk = Desk::find($id)->first();
        $desk->delete();

        $response = [
            'message' => 'Desk has been deleted'
        ];
        return response()->json($response, 200);
    }

    public function rent(int $deskId, int $userId)
    {
        $desk = Desk::find($deskId);

        if ($desk->is_taken) {

            $response = [
                'message' => 'You cannot rent this desk'
            ];
            return response()->json($response, 200);

        } else {

            $renter = User::find($userId);

            $desk->user_id = $userId;

            $response = [
                'message' => 'You have successfully rented this desk!',
                'desk' => $desk,
                'renter' => $renter
            ];

            return response()->json($response, 201);
        }
    }
    
}
