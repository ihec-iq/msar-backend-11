<?php

namespace Database\Seeders;

use App\Models\BonusStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BonusStage::create([ 'name' => '1']);
        BonusStage::create([ 'name' => '2']);
        BonusStage::create([ 'name' => '3']);
        BonusStage::create([ 'name' => '4']);
        BonusStage::create([ 'name' => '5']);
        BonusStage::create([ 'name' => '6']);
        BonusStage::create([ 'name' => '7']);
        BonusStage::create([ 'name' => '8']);
        BonusStage::create([ 'name' => '9']);
        BonusStage::create([ 'name' => '10']);
        BonusStage::create([ 'name' => '11']);

    }
}
