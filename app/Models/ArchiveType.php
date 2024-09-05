<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArchiveType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Archives(): HasMany
    {
        return $this->hasMany(Archive::class);
    }
    public function ArchivesCountAttribute()
    {
        return $this->Archives()->count();
    }
    public function Section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
