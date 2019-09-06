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
    }
}
