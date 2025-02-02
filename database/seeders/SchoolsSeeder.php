<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'Universitat de Barcelona (UB)',
                'address' => 'Gran Via de les Corts Catalanes, 585, 08007 Barcelona, España',
                'email' => 'informacio@ub.edu',
                'phone_number' => '+34 934021100',
                'website' => 'https://www.ub.edu'
            ],
            [
                'name' => 'Universitat Autònoma de Barcelona (UAB)',
                'address' => 'Campus de Bellaterra, Plaça Cívica, 08193 Cerdanyola del Vallès, Barcelona, España',
                'email' => 'informacio@uab.cat',
                'phone_number' => '+34 935811111',
                'website' => 'https://www.uab.cat'
            ],
            [
                'name' => 'Universitat Politècnica de Catalunya (UPC)',
                'address' => 'C. Jordi Girona, 31, 08034 Barcelona, España',
                'email' => 'info@upc.edu',
                'phone_number' => '+34 934016000',
                'website' => 'https://www.upc.edu'
            ]
        ];

        foreach ($schools as $school) {
            School::create( $school);
        }
    }
}
