<?php

namespace Database\Seeders;

use App\Models\Bonuses;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        foreach ($employees as $key => $employee) {
            Bonuses::create(
                [
                    'employee_id' => $employee->id,
                    'bonus_digree_stage_id' => 1,
                    'bonus_study_id' => 1,
                    'bonus_job_title_id' => 1
                ]
            );
        }
    }
}
