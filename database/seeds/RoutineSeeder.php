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
            "name" => "Kick Boxing",
            "description" => "Fight doing excersice"
        ]);

        DB::table("routines")->insert([
            "name" => "Zumba",
            "description" => "Baile zumba"
        ]);

        DB::table("routines")->insert([
            "name" => "Full Combat",
            "description" => "Fight doing excersice"
        ]);
    }
}
