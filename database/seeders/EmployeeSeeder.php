<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory()->count(1)->create(
            [
                'first_name'=>'Harsh',
                'last_name'=>'Satawara',
                'email'=>'harsh@gmail.com',
            ]
        );
        Employee::factory()->count(2)->create();
    }
}
