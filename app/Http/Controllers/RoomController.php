<?php

namespace App\Http\Controllers;

use App\Room;
use App\Token;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showAll($token)
    {
        if (!Token::check($token)){
            return response()->json("unauthorized token", 401);
        }      
        $rooms = Room::all();
        foreach ($rooms as $room) {
            $room->messages;
        }      
        return response()->json($rooms);
    }



    public function showAllRooms($token)
    {

        if (!Token::check($token)) {
            return response()->json('Unauthorized token', 401);
        }

        return response()->json(Room::all());
    }

    public function showOne(room $room, $token)
    {
        if (!Token::check($token)){
            return response()->json("unauthorized token", 401);
        }

        return response()->json($room);
    }

    public function showRoomMessages(Room $room, $token, Request $request)
    {      
        if (!Token::check($token)){
            return response()->json("unauthorized token", 401);
        }
        $page = $request->page;
        $messages = $room->messages->sortByDesc('created_at')->forPage($page, 20);
        foreach ($messages as $message) {
            $message->user->user_type;
        }
        return response()->json($messages);
    }



}