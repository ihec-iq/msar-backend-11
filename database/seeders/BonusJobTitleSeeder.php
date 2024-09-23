<?php

namespace Database\Seeders;

use App\Models\BonusJobTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusJobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BonusJobTitle::create([ 'name' => 'المدير العام']);
        BonusJobTitle::create([ 'name' => 'المدير التنفيذي']);
        BonusJobTitle::create([ 'name' => 'المدير المالي']);

    }
}
