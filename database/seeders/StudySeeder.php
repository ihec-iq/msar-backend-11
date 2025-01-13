<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Study::create(['name' => 'غير محدد']);
        Study::create(['name' => 'يقرأ ويكتب']);
        Study::create(['name' => 'ابتدائية']);
        Study::create(['name' => 'اعدادية']);
        Study::create(['name' => 'بكلوريوس']);
        Study::create(['name' => 'دبلوم']);
        Study::create(['name' => 'دبلوم عالي']);
        Study::create(['name' => 'ماجستير']);
        Study::create(['name' => 'دكتوراه']);
    }
}
