<?php

namespace Database\Seeders;

use App\Http\Controllers\api\v1\VacationController;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Employee::factory()->count(10)->create();
        $vacationController = new VacationController();
        $vacationController->makeVacation();

    }
}
