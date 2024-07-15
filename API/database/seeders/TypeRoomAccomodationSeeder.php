<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeRooms;
use App\Models\TypeRoomAccomodations;
use App\Models\Accommodations;

class TypeRoomAccomodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeRoom = TypeRooms::all();
        $accomodation = Accommodations::all();

       //si TypeRooms es igual 1 entonces Accommodations es sencilla y doble

        if ($typeRoom[0]['id'] == 1) {
            $typeRoom->each(function ($typeRoom) use ($accomodation) {
                $accomodation->each(function ($accomodation) use ($typeRoom) {
                    TypeRoomAccomodations::create([
                        'type_room_id' => $typeRoom->id,
                        'accommodation_id' => $accomodation->id,
                    ]);
                });
            });
        }

        //si TypeRooms es igual 2 entonces Accommodations es sencilla, doble y triple
        if ($typeRoom[0]['id'] == 2) {
            $typeRoom->each(function ($typeRoom) use ($accomodation) {
                $accomodation->each(function ($accomodation) use ($typeRoom) {
                    TypeRoomAccomodations::insert([
                        'type_room_id' => $typeRoom->id,
                        'accommodation_id' => $accomodation->id,
                    ]);
                });
            });
        }

        //si TypeRooms es igual 3 entonces Accommodations es sencilla, doble, triple y cuadruple
        if ($typeRoom[0]['id'] == 3) {
            $typeRoom->each(function ($typeRoom) use ($accomodation) {
                $accomodation->each(function ($accomodation) use ($typeRoom) {
                    TypeRoomAccomodations::insert([
                        'type_room_id' => $typeRoom->id,
                        'accommodation_id' => $accomodation->id,
                    ]);
                });
            });
        }
    }
}
