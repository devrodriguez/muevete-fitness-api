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
            "name" => "5 a 6",
            "startHour" => 5,
            "finalHour" => 6,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "6 a 7",
            "startHour" => 6,
            "finalHour" => 7,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "7 a 8",
            "startHour" => 7,
            "finalHour" => 8,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "8 a 9",
            "startHour" => 8,
            "finalHour" => 9,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "5 a 6",
            "startHour" => 5,
            "finalHour" => 6,
            "period" => "pm"
        ]);

        DB::table("sessions")->insert([
            "name" => "6 a 7",
            "startHour" => 6,
            "finalHour" => 7,
            "period" => "pm"
        ]);

        DB::table("sessions")->insert([
            "name" => "7 a 8",
            "startHour" => 7,
            "finalHour" => 8,
            "period" => "pm"
        ]);

        DB::table("sessions")->insert([
            "name" => "8 a 9",
            "startHour" => 8,
            "finalHour" => 9,
            "period" => "pm"
        ]);
    }
}
