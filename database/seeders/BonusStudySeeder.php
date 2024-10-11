<?php

namespace Database\Seeders;

use App\Models\BonusStudy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BonusStudy::create([ 'name' => 'غير محدد']);
        BonusStudy::create([ 'name' => 'يقرأ ويكتب']);
        BonusStudy::create([ 'name' => 'ابتدائية']);
        BonusStudy::create([ 'name' => 'اعدادية']);
        BonusStudy::create([ 'name' => 'بكلوريوس']);
        BonusStudy::create([ 'name' => 'دبلوم']);
        BonusStudy::create([ 'name' => 'دبلوم عالي']);
        BonusStudy::create([ 'name' => 'ماجستير']);
        BonusStudy::create([ 'name' => 'دكتوراه']);
    }
}
