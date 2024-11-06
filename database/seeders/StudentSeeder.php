<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Student::factory(100)->create();
    }
}
