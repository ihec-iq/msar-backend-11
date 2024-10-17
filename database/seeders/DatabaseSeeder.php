<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            DepartmentSeeder::class,
            DocumentTypeSeeder::class,
            SectionSeeder::class,
            EmployeePositionSeeder::class,
            EmployeeCenterSeeder::class,
            EmployeeTypeSeeder::class,
            BonusDegreeSeeder::class,
            BonusStageSeeder::class,
            BonusDegreeStageSeeder::class,
            BonusJobTitleSeeder::class,
            BonusStudySeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            ArchiveTypeSeeder::class,
                //ArchiveSeeder::class,
            StockSeeder::class,
            ItemCategorySeeder::class,
            //ItemSeeder::class,
            InputVoucherStateSeeder::class,
            //InputVoucherSeeder::class,
            //InputVoucherItemSeeder::class,
            OutputVoucherSeeder::class,
            OutputVoucherItemSeeder::class,
            VacationTypeSeeder::class,
            VacationReasonSeeder::class,
            RetrievalVoucherItemTypeSeeder::class,
            HrDocumentTypeSeeder::class,
            
            UserHrSeeder::class
        ]);
    }
}
