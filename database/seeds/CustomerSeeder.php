<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            "name" => "John",
            "last_name" => "Rodriguez",
            "email" => "john@hotmail.com",
            "password" => Hash::make("12345"),
            "age" => 33
        ]);
    }
}
