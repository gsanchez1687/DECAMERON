<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\TypeRooms;
use App\Models\Accommodations;
use App\Models\TypeRoomAccomodations;
use Illuminate\Support\Facades\DB;
class HotelsController extends Controller
{

    public function all(){
        try {
            $hotels = Hotels::with('status')
            ->OrderBy('id', 'desc')
            ->get();
            return response()->json($hotels, 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al obtener los hoteles', 'error' => $th->getMessage()], 400);
        }
    }

    public function rooms(){

        try {
            $rooms = TypeRooms::all();
            return response()->json($rooms, 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al obtener los tipos de habitaciones', 'error' => $th->getMessage()], 400);
        }
    }

    public function accommodations(){

        try {
            $accommodations = Accommodations::all();
            return response()->json($accommodations, 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al obtener los tipos de alojamiento', 'error' => $th->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'user_id' => 'integer',
                'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:100|unique:hotels',
                'address' => 'required|string',
                'zip_code' => 'required|integer',
                'phone' => 'required|integer',
                'email' => 'required|email|unique:hotels',
                'website' => 'required|url',
                'maximum_rooms' => 'required|integer',
                'image' => 'max:2048',
                'description' => 'required|string|max:255',
                'status_id' => 'integer',
            ]);
            
            //guardar datos
            $hotel = Hotels::create([
                'user_id' =>1,
                'name'=> $request->name,
                'address'=>$request->address,
                'zip_code'=>$request->zip_code,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'website'=>$request->website,
                'maximum_rooms'=>$request->maximum_rooms,
                'image'=>'demo.png',
                'description'=>$request->description,
                'status_id'=>5
            ]);

            TypeRoomAccomodations::create([
                'hotel_id' => $hotel->id,
                'type_room_id' => $request->room_id,
                'accommodation_id' => $request->accommodation_id
            ]);
            DB::commit();
            return response()->json($hotel, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => 'Error al registrar el hotel', 'error' => $th->getMessage()], 400);
        }
    }

    public function count(){
        try {
            $count = Hotels::count();
            return response()->json($count, 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al obtener la cantidad de hoteles', 'error' => $th->getMessage()], 400);
        }
    }
}
