<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;

class HotelsController extends Controller
{
    public function store(Request $request)
    {
        try {
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
            return response()->json($hotel, 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al registrar el hotel', 'error' => $th->getMessage()], 400);
        }
    }
}
