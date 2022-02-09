<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
          $count = Company::count();
             if($count == 0) {
                    $company->create([
                          "name" => 'New TechInfo',
                          "Location" => 'Dubai',
                 ]);
         }
       
    
    }
}
