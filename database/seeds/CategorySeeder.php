<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                "name" => "Circuito"
            ],
            [
                "name" => "Musculacion"
            ],
            [
                "name" => "Clases Grupales"
            ]
        ]);

        DB::table('routine_category')->insert([
            "routine_id" => 1,
            "category_id" => 1
        ]);
    }
}
