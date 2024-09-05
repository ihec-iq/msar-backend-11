<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function HrDocument(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable');
    }

}
