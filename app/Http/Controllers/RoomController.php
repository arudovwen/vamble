<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Services\RoomService;

class RoomController extends Controller
{
    public $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {

        return $this->roomService->getrooms();
    }
    public function roomtypes()
    {

        return $this->roomService->getroomtypes();
    }
    public function store(Request $request)
    {

        return $this->roomService->addroom($request);
    }
    public function show(Room $room)
    {
        return $room;
    }

    public function searchroom(Request $request)
    {
        return $this->roomService->getavailablerooms($request);
    }

    public function updateRoomCheckIn($name, $count)
    {
        return $this->roomService->updateRoomCheckIn($name, $count);
    }

    public function updateRoomCheckOut($name, $count)
    {
        return $this->roomService->updateRoomCheckOut($name, $count);
    }
    public function update(Request $request, Room $room)
    {
        return $this->roomService->updateroom($request, $room);
    }

    public function destroy(Room $room)
    {
        return $this->roomService->removeroom($room);
    }
}
