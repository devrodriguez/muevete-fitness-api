<?php

use Illuminate\Database\Seeder;

class AvailableDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add available days
        DB::table('available_days')
        ->insert([
            [
                "name" => "Lunes",
                "day_of_week" => 1
            ],
            [
                "name" => "Martes",
                "day_of_week" => 2
            ],
            [
                "name" => "Miercoles",
                "day_of_week" => 3
            ],
            [
                "name" => "Jueves",
                "day_of_week" => 4
            ],
            [
                "name" => "Viernes",
                "day_of_week" => 5
            ],
            [
                "name" => "Sabado",
                "day_of_week" => 6
            ],
            [
                "name" => "Domingo",
                "day_of_week" => 7
            ],
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
