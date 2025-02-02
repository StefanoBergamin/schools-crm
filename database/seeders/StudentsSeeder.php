<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'first_name' => 'Laura',
                'last_name' => 'Martínez',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2002-05-14',
                'hometown' => 'Barcelona'
            ],
            [
                'first_name' => 'Pablo',
                'last_name' => 'González',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2001-11-22',
                'hometown' => 'Tarragona'
            ],
            [
                'first_name' => 'Clara',
                'last_name' => 'Fernández',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2003-03-30',
                'hometown' => 'Girona'
            ],
            [
                'first_name' => 'Jordi',
                'last_name' => 'López',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2000-08-12',
                'hometown' => 'Lleida'
            ],
            [
                'first_name' => 'Marta',
                'last_name' => 'Sánchez',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2002-01-25',
                'hometown' => 'Manresa'
            ],
            [
                'first_name' => 'Carlos',
                'last_name' => 'Ramírez',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2001-10-03',
                'hometown' => 'Reus'
            ],
            [
                'first_name' => 'Sofia',
                'last_name' => 'García',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2002-07-19',
                'hometown' => 'Badalona'
            ],
            [
                'first_name' => 'Daniel',
                'last_name' => 'Vázquez',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2001-12-09',
                'hometown' => 'Figueres'
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Martínez',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2003-02-17',
                'hometown' => 'Vic'
            ],
            [
                'first_name' => 'Ricardo',
                'last_name' => 'Díaz',
                'school_id' => rand(1, 3),
                'date_of_birth' => '2000-09-29',
                'hometown' => 'Castelldefels'
            ]
        ];

        foreach ($students as $student) {
            Student::create( $student);
        }
    }
}
