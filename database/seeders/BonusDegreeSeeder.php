<?php

namespace Database\Seeders;

use App\Models\BonusDegree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BonusDegree::create([ 'name' => '1']);
        BonusDegree::create([ 'name' => '2']);
        BonusDegree::create([ 'name' => '3']);
        BonusDegree::create([ 'name' => '4']);
        BonusDegree::create([ 'name' => '5']);
        BonusDegree::create([ 'name' => '6']);
        BonusDegree::create([ 'name' => '7']);
        BonusDegree::create([ 'name' => '8']);
        BonusDegree::create([ 'name' => '9']);
        BonusDegree::create([ 'name' => '10']);

    }
}
