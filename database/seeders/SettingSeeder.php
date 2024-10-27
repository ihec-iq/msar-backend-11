<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key'=> 'SettingNumberDayesAlertBonus',
            'val_int'=>30,
            'description' => 'عدد الايام الداخلة في التنبيهات'
        ]);
         
    }
}
