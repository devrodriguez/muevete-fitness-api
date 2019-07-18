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
            "start_hour" => 5,
            "final_hour" => 6,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "6 a 7",
            "start_hour" => 6,
            "final_hour" => 7,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "7 a 8",
            "start_hour" => 7,
            "final_hour" => 8,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "8 a 9",
            "start_hour" => 8,
            "final_hour" => 9,
            "period" => "am"
        ]);

        DB::table("sessions")->insert([
            "name" => "5 a 6",
            "start_hour" => 5,
            "final_hour" => 6,
            "period" => "pm"
        ]);

        DB::table("sessions")->insert([
            "name" => "6 a 7",
            "start_hour" => 6,
            "final_hour" => 7,
            "period" => "pm"
        ]);

        DB::table("sessions")->insert([
            "name" => "7 a 8",
            "start_hour" => 7,
            "final_hour" => 8,
            "period" => "pm"
        ]);

        DB::table("sessions")->insert([
            "name" => "8 a 9",
            "start_hour" => 8,
            "final_hour" => 9,
            "period" => "pm"
        ]);
    }
}
