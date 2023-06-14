<?php

namespace Database\Seeders;

use App\Models\Attendence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Attendence::create([
            'ip'=>'172.16.4.180',
            'location'=>'PF Ground 1'
        ]);

         Attendence::create([
            'ip'=>'192.168.1.1',
            'location'=>'PF Ground 2'
        ]);



        Attendence::create([
            'ip'=>'192.168.1.2',
            'location'=>'Remote'
        ]);
    }
}