<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Archive extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }
    public function ArchiveType(): BelongsTo
    {
        return $this->belongsTo(ArchiveType::class);
    }
}
