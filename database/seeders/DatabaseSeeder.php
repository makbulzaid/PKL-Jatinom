<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
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
        
        Employee::factory(2500)->create();
        
        Company::create([
            'nama_company' => 'Jatinom Indah Farm',
            'slug_company' => 'JIF',
            'link' => '/employee?company=JIF'
        ]);

        Company::create([
            'nama_company' => 'Jatinom Indah Agri',
            'slug_company' => 'JIA',
            'link' => '/employee?company=JIA'
        ]);

        Company::create([
            'nama_company' => 'Sawit Arum Madani',
            'slug_company' => 'SAM',
            'link' => '/employee?company=SAM'
        ]);

        Company::create([
            'nama_company' => 'Lima Satu Lima',
            'slug_company' => 'LSL',
            'link' => '/employee?company=LSL'
        ]);

        Company::create([
            'nama_company' => 'Joglo Prima Rasa',
            'slug_company' => 'JPR',
            'link' => '/employee?company=JPR'
        ]);

        Company::create([
            'nama_company' => 'Siswojo Putra Motor',
            'slug_company' => 'SPM',
            'link' => '/employee?company=SPM'
        ]);

        Company::create([
            'nama_company' => 'Sukmo Giri Indah',
            'slug_company' => 'SGI',
            'link' => '/employee?company=SGI'
        ]);
        
        Company::create([
            'nama_company' => 'Jatinom Unggas Perkasa',
            'slug_company' => 'JUP',
            'link' => '/employee?company=JUP'
        ]);

        for ($i=1; $i < 2500; $i++) { 
            DB::table('company_employee')->insert([
                'employee_id' => $i,
                'company_id' => rand(1, 8)
            ]);
        };

        for ($i=1; $i < 500; $i++) { 
            DB::table('company_employee')->insert([
                'employee_id' => rand(1, 500),
                'company_id' => rand(1, 8)
            ]);
        };
    }
}
