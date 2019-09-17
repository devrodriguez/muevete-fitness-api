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
                "start_hour" => "05:00",
                "final_hour" => "06:00",
                "period" => "am"
            ],
            [
                "name" => "6 a 7",
                "start_hour" => "06:00",
                "final_hour" => "07:00",
                "period" => "am"
            ],
            [
                "name" => "7 a 8",
                "start_hour" => "07:00",
                "final_hour" => "08:00",
                "period" => "am"
            ],
            [
                "name" => "8 a 9",
                "start_hour" => "08:00",
                "final_hour" => "09:00",
                "period" => "am"
            ],
            [
                "name" => "9 a 10",
                "start_hour" => "09:00",
                "final_hour" => "10:00",
                "period" => "am"
            ],
            [
                "name" => "10 a 11",
                "start_hour" => "10:00",
                "final_hour" => "11:00",
                "period" => "am"
            ],
            [
                "name" => "11 a 12",
                "start_hour" => "11:00",
                "final_hour" => "12:00",
                "period" => "am"
            ],
            [
                "name" => "12 a 1",
                "start_hour" => "12:00",
                "final_hour" => "01:00",
                "period" => "pm"
            ],
            [
                "name" => "1 a 2",
                "start_hour" => "01:00",
                "final_hour" => "02:00",
                "period" => "pm"
            ],
            [
                "name" => "2 a 3",
                "start_hour" => "02:00",
                "final_hour" => "03:00",
                "period" => "pm"
            ],
            [
                "name" => "3 a 4",
                "start_hour" => "03:00",
                "final_hour" => "04:00",
                "period" => "pm"
            ],
            [
                "name" => "4 a 5",
                "start_hour" => "04:00",
                "final_hour" => "05:00",
                "period" => "pm"
            ],
            [
                "name" => "5 a 6",
                "start_hour" => "05:00",
                "final_hour" => "06:00",
                "period" => "pm"
            ],
            [
                "name" => "6 a 7",
                "start_hour" => "06:00",
                "final_hour" => "07:00",
                "period" => "pm"
            ],
            [
                "name" => "7 a 8",
                "start_hour" => "07:00",
                "final_hour" => "08:00",
                "period" => "pm"
            ],
            [
                "name" => "8 a 9",
                "start_hour" => "08:00",
                "final_hour" => "09:00",
                "period" => "pm"
            ],
            [
                "name" => "9 a 10",
                "start_hour" => "09:00",
                "final_hour" => "10:00",
                "period" => "pm"
            ],
            [
                "name" => "7:30 a 8:30",
                "start_hour" => "07:30",
                "final_hour" => "08:30",
                "period" => "pm"
            ],
            [
                "name" => "11:30 a 1:00",
                "start_hour" => "11:30",
                "final_hour" => "01:00",
                "period" => "am"
            ],
            [
                "name" => "2:30 a 4:00",
                "start_hour" => "02:30",
                "final_hour" => "04:00",
                "period" => "pm"
            ]
        ]);
    }
}
