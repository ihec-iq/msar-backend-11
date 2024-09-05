<?php

namespace Database\Seeders;

use App\Models\VacationType;
use Illuminate\Database\Seeder;

class VacationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VacationType::create([
            'name' => 'اجازة زمنية',
            'days_per_year' => '0',
        ]);
        VacationType::create([
            'name' => 'اجازة اعتيادية',
            'days_per_year' => '36',
        ]);
        VacationType::create([
            'name' => 'اجازة مرضية',
            'days_per_year' => '30',
        ]);
    }
}
