<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $faker = Faker::create();
        $count = DB::table('users')->count();
        if($count == 0) {
        DB::table("users")->insert([
            "Name" => $faker->name(),
            "salary" => $faker->numerify('###'),
            "password" =>bcrypt("12345678"),
            "email"=>$faker->email(),
            "company_id"=>1,
            
        ]);
    }
    }
}