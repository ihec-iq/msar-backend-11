<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_section');
    }
    public function Department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
