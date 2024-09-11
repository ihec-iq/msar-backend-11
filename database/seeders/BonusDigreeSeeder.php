<?php

namespace Database\Seeders;

use App\Models\BonusDigree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusDigreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BonusDigree::create([ 'name' => '1']);
        BonusDigree::create([ 'name' => '2']);
        BonusDigree::create([ 'name' => '3']);
        BonusDigree::create([ 'name' => '4']);
        BonusDigree::create([ 'name' => '5']);
        BonusDigree::create([ 'name' => '6']);
        BonusDigree::create([ 'name' => '7']);
        BonusDigree::create([ 'name' => '8']);
        BonusDigree::create([ 'name' => '9']);
        BonusDigree::create([ 'name' => '10']);

    }
}
