<?php

namespace Database\Seeders;

use App\Models\RetrievalVoucherItemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetrievalVoucherItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RetrievalVoucherItemType::create(['name'=>'المخزن']);
        RetrievalVoucherItemType::create(['name'=>'مستهلك']);
        RetrievalVoucherItemType::create(['name'=>'مشطوب']);
        RetrievalVoucherItemType::create(['name'=>'مباع']);
        RetrievalVoucherItemType::create(['name'=>'مهداة']);
    }
}
