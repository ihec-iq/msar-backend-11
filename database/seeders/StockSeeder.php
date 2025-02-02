<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'name' => 'غير محدد', 
        ]);
        Stock::create([
            'name' => 'مخزن الاجهزة البايومترية', 
        ]);

        Stock::create([
            'name' => 'مخزن الموجودات الثابتة', 
        ]);
    }
}
