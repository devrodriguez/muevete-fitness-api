<?php

use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("routines")->insert([
            [
                "name" => "Abdomen",
                "description" => ""
            ],
            [
                "name" => "Crossfit",
                "description" => ""
            ],
            [
                "name" => "Gluteo",
                "description" => ""
            ],
            [
                "name" => "Military Training",
                "description" => ""
            ],
            [
                "name" => "Power Core XT",
                "description" => ""
            ],
            [
                "name" => "Funcional",
                "description" => ""
            ],
            [
                "name" => "GAP (Gluteo - Abdomen - Pierna)",
                "description" => ""
            ],
            [
                "name" => "Tren Inferior",
                "description" => ""
            ],
            [
                "name" => "Tren Superior",
                "description" => ""
            ],
            [
                "name" => "Fitcombat",
                "description" => ""
            ],
            [
                "name" => "Rumba",
                "description" => ""
            ],
            [
                "name" => "Yoga",
                "description" => ""
            ],
            [
                "name" => "Zumba",
                "description" => ""
            ],
            [
                "name" => "Ballet",
                "description" => ""
            ],
            [
                "name" => "Salsa",
                "description" => ""
            ],
            [
                "name" => "Full Combat",
                "description" => ""
            ],
            [
                "name" => "Tonificacion Muscular Superior",
                "description" => ""
            ],
            [
                "name" => "Zumba Neon",
                "description" => ""
            ]
        ]);

        //Add routine by day
        DB::table('routine_availability')
        ->insert([
            [
                "routine_id" => 4,
                "available_day_id" => 1
            ],
            [
                "routine_id" => 8,
                "available_day_id" => 1
            ],
            [
                "routine_id" => 10,
                "available_day_id" => 1
            ],
            [
                "routine_id" => 2,
                "available_day_id" => 2
            ],
            [
                "routine_id" => 1,
                "available_day_id" => 2
            ],
            [
                "routine_id" => 11,
                "available_day_id" => 2
            ],

            [
                "routine_id" => 3,
                "available_day_id" => 3
            ],
            [
                "routine_id" => 9,
                "available_day_id" => 3
            ],
            [
                "routine_id" => 1,
                "available_day_id" => 4
            ],
            [
                "routine_id" => 8,
                "available_day_id" => 4
            ],
            [
                "routine_id" => 12,
                "available_day_id" => 4
            ],
            [
                "routine_id" => 9,
                "available_day_id" => 5
            ],
            [
                "routine_id" => 17,
                "available_day_id" => 5
            ],
            [
                "routine_id" => 18,
                "available_day_id" => 5
            ]
        ]);
    }
}
