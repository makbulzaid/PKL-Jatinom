<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Land;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'adminlevel',
            'email' => 'adminlevel@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'managerlevel',
            'email' => 'managerlevel@gmail.com',
            'password' => bcrypt('password2')
        ]);
        
        // Employee::factory(250)->create();
        
        Company::create([
            'nama_company' => 'Jatinom Indah Farm',
            'slug_company' => 'JIF',
            
        ]);

        Company::create([
            'nama_company' => 'Jatinom Indah Agri',
            'slug_company' => 'JIA',
            
        ]);

        Company::create([
            'nama_company' => 'Sawit Arum Madani',
            'slug_company' => 'SAM',
            
        ]);

        Company::create([
            'nama_company' => 'Lima Satu Lima',
            'slug_company' => 'LSL',
            
        ]);

        Company::create([
            'nama_company' => 'Joglo Prima Rasa',
            'slug_company' => 'JPR',
            
        ]);

        Company::create([
            'nama_company' => 'Siswojo Putra Motor',
            'slug_company' => 'SPM',
            
        ]);

        Company::create([
            'nama_company' => 'Sukmo Giri Indah',
            'slug_company' => 'SGI',
            
        ]);
        
        Company::create([
            'nama_company' => 'Jatinom Unggas Perkasa',
            'slug_company' => 'JUP',
            
        ]);

        // for ($i=1; $i < 250; $i++) { 
        //     DB::table('company_employee')->insert([
        //         'employee_id' => $i,
        //         'company_id' => rand(1, 8)
        //     ]);
        // };

        // for ($i=1; $i < 100; $i++) { 
        //     DB::table('company_employee')->insert([
        //         'employee_id' => rand(1, 100),
        //         'company_id' => rand(1, 8)
        //     ]);
        // };

        // Land::factory(100)->create();
        // Vehicle::factory(100)->create();
    }
}
