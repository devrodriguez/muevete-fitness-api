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
            ]
        ]);
    }
}
