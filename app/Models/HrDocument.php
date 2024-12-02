<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HrDocument extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function Documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }
    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
    public function Type(): BelongsTo
    {
        return $this->belongsTo(HrDocumentType::class,"hr_document_type_id");
    }
    public function UserCreate(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_create_id", 'id');
    }
    public function UserUpdate(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_update_id", 'id');
    }
}
