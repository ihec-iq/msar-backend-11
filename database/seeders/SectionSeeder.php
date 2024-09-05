<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name' => 'غير محدد',
            'department_id'=> 1
        ]);
        Section::create([
            'name' => 'شعبة التجهيز والمخازن',
            'department_id' => 3
        ]);
        Section::create([
            'name' => 'شعبة الاعلام والاتصال الجماهيري',
            'department_id' => 3
        ]);
        Section::create([
            'name' => 'شعبة الادارية',
            'department_id' => 2
        ]);
        Section::create([
            'name' => 'شعبة الاجرائات والتدريب',
            'department_id' => 3
        ]);
        Section::create([
            'name' => 'شعبة الأمنية',
            'department_id' => 2
        ]);
        Section::create([
            'name' => 'شعبة  الدفاع المدني والسلامة المهنية',
            'department_id' => 1
        ]);

        Section::create([
            'name' => 'شعبة سجل الناخبين وتكنلوجيا المعلومات',
            'department_id' => 3
        ]);
        Section::create([
            'name' => 'شعبة الرقابة والتدقيق الداخلي',
            'department_id' => 1
        ]);
        Section::create([
            'name' => 'شعبة القانونية والشكاوى',
            'department_id' => 2
        ]);
        Section::create([
            'name' => 'شعبة الخدمات والصيانة والنقل',
            'department_id' => 2
        ]);
        Section::create([
            'name' => 'شعبة المالية',
            'department_id' => 2
        ]);

        Section::create([
            'name' => 'مراكز التسجيل',
            'department_id' => 3
        ]);
        Section::create([
            'name' => 'شؤون مراكز التسجيل',
            'department_id' => 3
        ]);
        Section::create([
            'name' => 'شعبة الأحزاب والمرشحين',
            'department_id' => 3
        ]);
        Section::create([
            'name' => 'مكتب المدير',
            'department_id' => 1
        ]);
        Section::create([
            'name' => 'المعاون الإداري والمالي',
            'department_id' => 1
        ]);
        Section::create([
            'name' => 'المعاون الفني',
            'department_id' => 1
        ]);
    }
}
