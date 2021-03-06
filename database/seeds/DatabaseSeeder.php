<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TrainerSeeder::class);
        $this->call(ProfessionSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(AvailableDaySeeder::class);
        $this->call(RoutineSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(WeeklySeeder::class);
    }
}
