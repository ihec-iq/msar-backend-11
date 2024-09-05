<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemCategory::create([
            'name' => 'اجهزة كهربائية',
            'description' => 'تختص بالاجهزة الكهربائية والالكترونية',
            'user_create_id' => 1,
            'user_update_id' => 1
        ]);

        ItemCategory::create([
            'name' => 'اثاث',
            'description' => 'تختص بأثاث المكتب والاجهزة الثابتة',
            'user_create_id' => 1,
            'user_update_id' => 1
        ]);

        ItemCategory::create([
            'name' => 'عجلات',
            'description' => 'تختص بعجلات النقل',
            'user_create_id' => 1,
            'user_update_id' => 1
        ]);

        ItemCategory::create([
            'name' => 'اسلحة',
            'description' => 'تختص بالاسلحة النارية',
            'user_create_id' => 1,
            'user_update_id' => 1
        ]);

    }
}
