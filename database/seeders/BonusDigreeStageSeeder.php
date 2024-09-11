<?php

namespace Database\Seeders;

use App\Models\BonusDigreeStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusDigreeStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        BonusDigreeStage::create(['bonus_digree_id' => 1,'bonus_stage_id' => 1,'salery' => 0,'yearly_bounues' => 0,'yearly_service' => 0]);

#region Digree One
        BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 1,
                    'salery' => 910000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 2,
                    'salery' => 930000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);


BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 3,
                    'salery' => 950000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 4,
                    'salery' => 970000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 5,
                    'salery' => 990000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 6,
                    'salery' => 1010000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 7,
                    'salery' => 1030000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 8,
                    'salery' => 1050000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 9,
                    'salery' => 1070000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 10,
                    'salery' => 1090000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

BonusDigreeStage::create([
                    'bonus_digree_id' => 1,
                    'bonus_stage_id' => 11,
                    'salery' => 1110000,
                    'yearly_bounues' => 20,
                    'yearly_service' => 0
                ]);

#endregion
#region Digree Tow

BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 1,'salery' => 732000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 2,'salery' => 740000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 3,'salery' => 757000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 4,'salery' => 775000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 5,'salery' => 791000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 6,'salery' => 808000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 7,'salery' => 825000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 8,'salery' => 842000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 9,'salery' => 859000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' => 10,'salery' =>876000,'yearly_bounues' => 17,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 2,'bonus_stage_id' =>11,'salery' => 893000,'yearly_bounues' => 17,'yearly_service' => 5]);

#endregion

#region Digree Three

BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 1,'salery' => 600000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 2,'salery' => 610000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 3,'salery' => 620000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 4,'salery' => 630000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 5,'salery' => 640000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 6,'salery' => 650000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 7,'salery' => 660000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 8,'salery' => 670000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 9,'salery' => 680000,'yearly_bounues' => 10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 10,'salery' =>690000,'yearly_bounues' =>10,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 3,'bonus_stage_id' => 11,'salery' =>700000,'yearly_bounues' =>10,'yearly_service' => 5]);

#endregion


#region Digree Four

BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 1,'salery' => 509000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 2,'salery' => 517000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 3,'salery' => 525000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 4,'salery' => 533000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 5,'salery' => 541000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 6,'salery' => 549000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 7,'salery' => 557000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 8,'salery' => 565000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 9,'salery' => 573000,'yearly_bounues' => 8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 10,'salery' =>581000,'yearly_bounues' =>8,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 4,'bonus_stage_id' => 11,'salery' =>589000,'yearly_bounues' =>8,'yearly_service' => 5]);

#endregion


#region Digree Five

BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 1 ,'salery' => 429000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 2 ,'salery' => 435000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 3 ,'salery' => 441000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 4 ,'salery' => 447000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 5 ,'salery' => 453000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 6 ,'salery' => 459000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 7 ,'salery' => 465000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 8 ,'salery' => 471000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 9 ,'salery' => 477000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 10,'salery' => 483000,'yearly_bounues' => 6,'yearly_service' => 5]);
BonusDigreeStage::create(['bonus_digree_id' => 5,'bonus_stage_id' => 11,'salery' => 489000,'yearly_bounues' => 6,'yearly_service' => 5]);

#endregion


#region Digree six

BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 1 ,'salery' => 362000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 2 ,'salery' => 368000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 3 ,'salery' => 374000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 4 ,'salery' => 380000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 5 ,'salery' => 386000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 6 ,'salery' => 392000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 7 ,'salery' => 398000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 8 ,'salery' => 404000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 9 ,'salery' => 410000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 10,'salery' => 416000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 6,'bonus_stage_id' => 11,'salery' => 422000,'yearly_bounues' => 6,'yearly_service' => 4]);

#endregion


#region Digree Seven

BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 1 ,'salery' => 296000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 2 ,'salery' => 302000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 3 ,'salery' => 308000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 4 ,'salery' => 314000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 5 ,'salery' => 320000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 6 ,'salery' => 326000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 7 ,'salery' => 332000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 8 ,'salery' => 338000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 9 ,'salery' => 344000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 10,'salery' => 350000,'yearly_bounues' => 6,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 7,'bonus_stage_id' => 11,'salery' => 356000,'yearly_bounues' => 6,'yearly_service' => 4]);

#endregion


#region Digree Eight

BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 1 ,'salery' => 260000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 2 ,'salery' => 263000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 3 ,'salery' => 266000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 4 ,'salery' => 269000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 5 ,'salery' => 272000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 6 ,'salery' => 275000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 7 ,'salery' => 278000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 8 ,'salery' => 281000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 9 ,'salery' => 284000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 10,'salery' => 287000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 8,'bonus_stage_id' => 11,'salery' => 290000,'yearly_bounues' => 3,'yearly_service' => 4]);

#endregion



#region Digree nine

BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 1 ,'salery' => 210000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 2 ,'salery' => 213000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 3 ,'salery' => 216000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 4 ,'salery' => 219000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 5 ,'salery' => 222000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 6 ,'salery' => 225000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 7 ,'salery' => 228000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 8 ,'salery' => 231000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 9 ,'salery' => 234000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 10,'salery' => 237000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 9,'bonus_stage_id' => 11,'salery' => 24000,'yearly_bounues' => 3,'yearly_service' => 4]);

#endregion


#region Digree ten

BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 1 ,'salery' => 170000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 2 ,'salery' => 173000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 3 ,'salery' => 176000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 4 ,'salery' => 179000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 5 ,'salery' => 182000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 6 ,'salery' => 185000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 7 ,'salery' => 188000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 8 ,'salery' => 191000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 9 ,'salery' => 194000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 10,'salery' => 197000,'yearly_bounues' => 3,'yearly_service' => 4]);
BonusDigreeStage::create(['bonus_digree_id' => 10,'bonus_stage_id' => 11,'salery' => 200000,'yearly_bounues' => 3,'yearly_service' => 4]);

#endregion


}
}
