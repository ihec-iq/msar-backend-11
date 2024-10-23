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
                'salery' => 910000 + ($i - 1) * 20000,
                'yearly_bonus' => 20000,
                'yearly_service' => 0
            ]);
        }
        #endregion

        #region Degree Tow

        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 1, 'salery' => 732000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 2, 'salery' => 740000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 3, 'salery' => 757000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 4, 'salery' => 775000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 5, 'salery' => 791000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 6, 'salery' => 808000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 7, 'salery' => 825000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 8, 'salery' => 842000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 9, 'salery' => 859000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 10, 'salery' => 876000, 'yearly_bonus' => 17, 'yearly_service' => 5]);
        BonusDegreeStage::create(['bonus_degree_id' => 2, 'bonus_stage_id' => 11, 'salery' => 893000, 'yearly_bonus' => 17, 'yearly_service' => 5]);

        #endregion

        #region Degree Three

        for ($i = 1; $i <= 11; $i++) {
            BonusDegreeStage::create([
                'bonus_degree_id' => 3,
                'bonus_stage_id' => $i,
                'salery' => 600000 + ($i - 1) * 10000,
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
                'salery' => 509000 + ($i - 1) * 8000,
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
                'salery' => 429000 + ($i - 1) * 6000,
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
                'salery' => 362000 + ($i - 1) * 4000,
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
                'salery' => 296000 + ($i - 1) * 2000,
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
                'salery' => 260000 + ($i - 1) * 3000,
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
                'salery' => 210000 + ($i - 1) * 3000,
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
                'salery' => 170000 + ($i - 1) * 3000,
                'yearly_bonus' => 3000,
                'yearly_service' => 4
            ]);
        }

        #endregion


    }
}
