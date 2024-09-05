<?php

namespace Database\Seeders;

use App\Models\InputVoucherState;
use Illuminate\Database\Seeder;

class InputVoucherStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputVoucherState::create(['name' => 'مشتريات']);
        InputVoucherState::create(['name' => 'هدايا']);
        InputVoucherState::create(['name' => 'من المكتب الوطني']);
    }
}
