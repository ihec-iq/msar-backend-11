<?php

namespace Database\Seeders;

use App\Models\InputVoucherItem;
use Illuminate\Database\Seeder;

class InputVoucherItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$data = InputVoucherItem::factory()->count(1000)->create();
        // sum item 1 = 10+5 +3 = 18
        // sum item 2 = 13 +1 = 14
        // السند الاول
        InputVoucherItem::create([
            'input_voucher_id' => 1,
            'item_id' => 1,
            'stock_id' => 1,
            'description' => '',
            'count' => 10,
            'price' => 75000 * 100,
            'value' => 75000 * 10 * 100,
            'notes' => 'سبع مائة وخمسون الف دينار لاغير',
        ]);
        InputVoucherItem::create([
            'input_voucher_id' => 1,
            'item_id' => 2,
            'stock_id' => 2,
            'description' => '',
            'count' => 13,
            'price' => 5000 * 100,
            'value' => 5000 * 13 * 100,
            'notes' => 'مائة وخمسون الف دينار لاغير',
        ]);
        InputVoucherItem::create([
            'input_voucher_id' => 1,
            'item_id' => 1,
            'stock_id' => 2,
            'description' => '',
            'count' => 5,
            'price' => 75000 * 100,
            'value' => 75000 * 5 * 100,
            'notes' => 'اربع مائة وخمسون الف دينار لاغير',
        ]);
        // السند الثاني
        InputVoucherItem::create([
            'input_voucher_id' => 2,
            'item_id' => 1,
            'stock_id' => 1,
            'description' => '',
            'count' => 3,
            'price' => 75000 * 100,
            'value' => 75000 * 3 * 100,
            'notes' => 'مائة وخمسون الف دينار لاغير',
        ]);
        InputVoucherItem::create([
            'input_voucher_id' => 1,
            'item_id' => 2,
            'stock_id' => 2,
            'description' => '',
            'count' => 1,
            'price' => 5000 * 100,
            'value' => 5000 * 1 * 100,
            'notes' => 'خمسة الاف دينار لاغير',
        ]);

    }
}
