<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Faker\Factory as Faker;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $count = DB::table('companies')->count();
    //if($count == 0) {
    DB::table("companies")->insert([
        "Name" => $faker->company(),
        "Location" => $faker->address,
    ]);
  //  }
       
    
    }
}
