<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$data = Item::factory()->count(100)->create();
        Item::create([
            'name' => 'ميز خشب',
            'code' => 'A2152AA0001',
            'item_category_id' => 1,
            'description' => 'loren loren',
            'measuring_unit' => 'Item',
        ]);
        Item::create([
            'name' => 'كرسي بلاستك',
            'code' => 'A2152AA0002',
            'item_category_id' => 2,
            'description' => 'loren loren 2',
            'measuring_unit' => 'Item',
        ]);
    }
}
