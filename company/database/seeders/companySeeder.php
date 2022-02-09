<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    
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
