<?php

namespace Database\Seeders;

use App\Models\ArchiveType;
use App\Models\Section;
use Illuminate\Database\Seeder;

class ArchiveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ArchiveType::create([
        //     'name' => 'صادر',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'وارد',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'طلبات داخلية',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'جرودات',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'كلف تخمينية',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'مطالعات وتقارير',
        //     'section_id' => '2'
        // ]);

        // ArchiveType::create([
        //     'name' => 'متغيرات مخزنية',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'شؤون المراكز',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'تسلم واستلام',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'المحاكاة',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'موظفين الشعبة',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'مواد مستهلكة والمشطوبة',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'نشاطات الشعبة',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'متفرقة',
        //     'section_id' => '2'
        // ]);
        // ArchiveType::create([
        //     'name' => 'فورمات',
        //     'section_id' => '2'
        // ]);
        //ArchiveType::Truncate();
        $sections = Section::where('id', ">", 0)->get();
        foreach ($sections as $key => $section) {
            # code...
            ArchiveType::create([
                'name' => 'غير محدد',
                'section_id' => $section->id
            ]);
        }
    }
}
