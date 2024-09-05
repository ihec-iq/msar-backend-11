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
            'name' => 'كتب شكر 6 اشهر',
            'code' => '+',
            'add_days'=>6*30
        ]);
        HrDocumentType::create([
            'name' => 'كتب شكر 3 اشهر',
            'code' => '+',
            'add_days'=>3*30
        ]);
        HrDocumentType::create([
            'name' => 'كتب شكر 1 اشهر',
            'code' => '+',
            'add_days'=>30
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - لفت نظر',
            'code' => '-',
            'add_days' => -30
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - انذار',
            'code' => '-',
            'add_days' => -30 * 6
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - قطع راتب',
            'code' => '-',
            'add_days' => -30 * 5
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - توبيخ',
            'code' => '-',
            'add_days' => -30* 12
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - انقاص راتب',
            'code' => '-',
            'add_days' => -30 * 12 * 2
        ]);
        HrDocumentType::create([
            'name' => 'كتب عقوبة - تنزيل',
            'code' => '-',
            'add_days' => -30 * 12 * 3
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
