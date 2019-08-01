<?php

use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sessions")->insert([
            [
                "name" => "5 a 6",
                "start_hour" => 5,
                "final_hour" => 6,
                "period" => "am"
            ],
            [
                "name" => "6 a 7",
                "start_hour" => 6,
                "final_hour" => 7,
                "period" => "am"
            ],
            [
                "name" => "7 a 8",
                "start_hour" => 7,
                "final_hour" => 8,
                "period" => "am"
            ],
            [
                "name" => "8 a 9",
                "start_hour" => 8,
                "final_hour" => 9,
                "period" => "am"
            ],
            [
                "name" => "9 a 10",
                "start_hour" => 9,
                "final_hour" => 10,
                "period" => "am"
            ],
            [
                "name" => "10 a 11",
                "start_hour" => 10,
                "final_hour" => 11,
                "period" => "am"
            ],
            [
                "name" => "11 a 12",
                "start_hour" => 11,
                "final_hour" => 12,
                "period" => "am"
            ],
            [
                "name" => "12 a 1",
                "start_hour" => 12,
                "final_hour" => 1,
                "period" => "pm"
            ],
            [
                "name" => "1 a 2",
                "start_hour" => 1,
                "final_hour" => 2,
                "period" => "pm"
            ],
            [
                "name" => "2 a 3",
                "start_hour" => 2,
                "final_hour" => 3,
                "period" => "pm"
            ],
            [
                "name" => "3 a 4",
                "start_hour" => 3,
                "final_hour" => 4,
                "period" => "pm"
            ],
            [
                "name" => "4 a 5",
                "start_hour" => 4,
                "final_hour" => 5,
                "period" => "pm"
            ],
            [
                "name" => "5 a 6",
                "start_hour" => 5,
                "final_hour" => 6,
                "period" => "pm"
            ],
            [
                "name" => "6 a 7",
                "start_hour" => 6,
                "final_hour" => 7,
                "period" => "pm"
            ],
            [
                "name" => "7 a 8",
                "start_hour" => 7,
                "final_hour" => 8,
                "period" => "pm"
            ],
            [
                "name" => "8 a 9",
                "start_hour" => 8,
                "final_hour" => 9,
                "period" => "pm"
            ],
            [
                "name" => "9 a 10",
                "start_hour" => 9,
                "final_hour" => 10,
                "period" => "pm"
            ]
        ]);
    }
}
