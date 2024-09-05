<?php

namespace Database\Seeders;

use App\Models\VacationReason;
use Illuminate\Database\Seeder;

class VacationReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VacationReason::create(['name' => 'حاجة ماسة لها']);
        VacationReason::create(['name' => 'ضرف طارئ']);
        VacationReason::create(['name' => 'مراجعة دائرة حكومية']);
        VacationReason::create(['name' => 'حالة وفاة']);
        VacationReason::create(['name' => 'مرافقة مريض']);
        VacationReason::create(['name' => 'ضرف خاص']);
        VacationReason::create(['name' => 'ضرف عائلي']);
        VacationReason::create(['name' => 'سوء الحالة الصحية']);
        VacationReason::create(['name' => 'سفر خارج المحافظة']);
        VacationReason::create(['name' => 'سفر خارج القطر']);
        VacationReason::create(['name' => 'الزخم المروري']);
        VacationReason::create(['name' => 'أنجاز عمل ضروري']);
    }
}
