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
            [
                "category_id" => 1,
                "routine_id" => 1
            ],
            [
                "category_id" => 1,
                "routine_id" => 2
            ],
            [
                "category_id" => 1,
                "routine_id" => 3
            ],
            [
                "category_id" => 1,
                "routine_id" => 4
            ],
            [
                "category_id" => 1,
                "routine_id" => 5
            ],
            [
                "category_id" => 1,
                "routine_id" => 6
            ],
            [
                "category_id" => 1,
                "routine_id" => 7
            ],
            [
                "category_id" => 2,
                "routine_id" => 8
            ],
            [
                "category_id" => 2,
                "routine_id" => 9
            ],
            [
                "category_id" => 3,
                "routine_id" => 10
            ],
            [
                "category_id" => 3,
                "routine_id" => 11
            ],
            [
                "category_id" => 3,
                "routine_id" => 12
            ],
            [
                "category_id" => 3,
                "routine_id" => 13
            ],
            [
                "category_id" => 3,
                "routine_id" => 14
            ],
            [
                "category_id" => 3,
                "routine_id" => 15
            ],
            [
                "category_id" => 3,
                "routine_id" => 16
            ]
        ]);
    }
}
