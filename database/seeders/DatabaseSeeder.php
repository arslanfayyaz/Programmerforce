<?php

namespace Database\Seeders;
use App\Models\SubCategory;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     */
    public function run(): void
    {
        
     // foreach($value)
         // \App\Models\User::factory(10)->create();
        // $this->call(UserTableSeeder::class);
           
           App\Models\SubCategory::factory(3)->create();

    }
}
