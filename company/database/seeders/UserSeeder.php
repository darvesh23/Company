<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        //
        
        $count = $user->count();
        if($count == 0) {
        $user->insert([
            "Name" => "Mark John",
            "salary" => 999,
            "password" =>bcrypt("12345678"),
            "email"=>"john@co.us",
            "company_id"=>1,
            
        ]);
    }
    }
}
