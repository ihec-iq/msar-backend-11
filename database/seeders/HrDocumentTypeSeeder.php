<?php

namespace Database\Seeders;

use App\Models\HrDocumentType;
use Illuminate\Database\Seeder;

class HrDocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //HrDocumentType::truncate();
        HrDocumentType::create([
            'name' => 'غير محدد',
            'code' => ''
        ]);
        HrDocumentType::create([
            'name' => 'كتاب تشكر 6 اشهر',
            'code' => '+',
            'add_months'=>6,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتاب تشكر 3 اشهر',
            'code' => '+',
            'add_months'=>3,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتاب تشكر 1 اشهر',
            'code' => '+',
            'add_months'=>1,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتاب تشكر اضافة خدمة',
            'code' => '+',
            'add_months' => 0,
            'add_days' => 0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - لفت نظر',
            'code' => '-',
            'add_months'=>-1,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - انذار',
            'code' => '-',
            'add_months'=>-6,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - قطع راتب',
            'code' => '-',
            'add_months'=>-5,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - توبيخ',
            'code' => '-',
            'add_months'=>-12,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - انقاص راتب',
            'code' => '-',
            'add_months'=>-12,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - تنزيل',
            'code' => '-',
            'add_months'=>-12,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - غياب',
            'code' => '-',
            'add_months'=>0,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - اجازة بدون راتب',
            'code' => '-',
            'add_months'=>0,
            'add_days'=>0
        ]);
        HrDocumentType::create([
            'name' => 'اجازات',
            'code' => ''
        ]);
        HrDocumentType::create([
            'name' => 'لجان',
            'code' => ''
        ]);
        HrDocumentType::create([
            'name' => 'ايفادات',
            'code' => ''
        ]);
        HrDocumentType::create([
            'name' => 'كتب تأييد',
            'code' => ''
        ]);
        HrDocumentType::create([
            'name' => 'عامة',
            'code' => ''
        ]);
        HrDocumentType::create([
            'name' => 'مستمسكات',
        ]);
        HrDocumentType::create([
            'name' => 'علاوات وترفيعات',
        ]);
        HrDocumentType::create([
            'name' => 'اول تعيين ومباشرة',
        ]);
        HrDocumentType::create([
            'name' => 'نقل وتنسيب',
        ]);
        HrDocumentType::create([
            'name' => 'دورات وورش',
        ]);

        // HrDocumentType::create([
        //     'name' => '',
        // ]);
    }
}
