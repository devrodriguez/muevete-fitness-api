<?php

use Illuminate\Database\Seeder;

class WeeklySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weeklies')->insert([
            [
                'routine_availability_id' => 1,
                'session_id' => 1
            ],
            [
                'routine_availability_id' => 1,
                'session_id' => 2
            ],
            [
                'routine_availability_id' => 1,
                'session_id' => 3
            ],
            [
                'routine_availability_id' => 1,
                'session_id' => 4
            ],
            [
                'routine_availability_id' => 1,
                'session_id' => 13
            ],
            [
                'routine_availability_id' => 1,
                'session_id' => 14
            ],
            [
                'routine_availability_id' => 1,
                'session_id' => 15
            ],
            [
                'routine_availability_id' => 1,
                'session_id' => 16
            ]
        ]);
    }
}
