<?php

namespace Database\Seeders;

use App\Models\BonusDegreeStage;
use Illuminate\Database\Seeder;

class BonusDegreeStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        #region Degree One
        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 1,
                'bonus_stage_id' => $i,
                'salary' => 910000 + ($i - 1) * 20000,
                'yearly_bonus' => 20000,
                'yearly_service' => 0
            ]);
        }
        #endregion

        #region Degree Tow

        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 1, 'salary' => 732000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 2, 'salary' => 740000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 3, 'salary' => 757000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 4, 'salary' => 775000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 5, 'salary' => 791000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 6, 'salary' => 808000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 7, 'salary' => 825000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 8, 'salary' => 842000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 9, 'salary' => 859000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 10, 'salary' => 876000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 11, 'salary' => 893000, 'yearly_bonus' => 17, 'yearly_service' => 5]);

        #endregion

        #region Degree Three

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 3,
                'bonus_stage_id' => $i,
                'salary' => 600000 + ($i - 1) * 10000,
                'yearly_bonus' => 10000,
                'yearly_service' => 5
            ]);
        }
        #endregion


        #region Degree Four

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 4,
                'bonus_stage_id' => $i,
                'salary' => 509000 + ($i - 1) * 8000,
                'yearly_bonus' => 8000,
                'yearly_service' => 5
            ]);
        }

        #endregion


        #region Degree Five

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 5,
                'bonus_stage_id' => $i,
                'salary' => 429000 + ($i - 1) * 6000,
                'yearly_bonus' => 6000,
                'yearly_service' => 5
            ]);
        }

        #endregion


        #region Degree six

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 6,
                'bonus_stage_id' => $i,
                'salary' => 362000 + ($i - 1) * 4000,
                'yearly_bonus' => 6000,
                'yearly_service' => 4
            ]);
        }
        #endregion


        #region Degree Seven

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 7,
                'bonus_stage_id' => $i,
                'salary' => 296000 + ($i - 1) * 2000,
                'yearly_bonus' => 6000,
                'yearly_service' => 4
            ]);
        }


        #endregion


        #region Degree Eight

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 8,
                'bonus_stage_id' => $i,
                'salary' => 260000 + ($i - 1) * 3000,
                'yearly_bonus' => 3000,
                'yearly_service' => 4
            ]);
        }

        #endregion



        #region Degree nine

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 9,
                'bonus_stage_id' => $i,
                'salary' => 210000 + ($i - 1) * 3000,
                'yearly_bonus' => 3000,
                'yearly_service' => 4
            ]);
        }

        #endregion


        #region Degree ten

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 10,
                'bonus_stage_id' => $i,
                'salary' => 170000 + ($i - 1) * 3000,
                'yearly_bonus' => 3000,
                'yearly_service' => 4
            ]);
        }

        #endregion


    }
}
