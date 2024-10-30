<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    // ... existing code ...

    public function BonusDegreeStage()
    {
        return $this->belongsTo(BonusDegreeStage::class);
    }

    public function BonusJobTitle()
    {
        return $this->belongsTo(BonusJobTitle::class);
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
