<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'valStr' => $this->val_str,
            'valStr' => $this->val_str2,
            'valInt' => $this->val_int,
            'valDbl' => $this->val_dbl,
            'valBool' => $this->val_bool,
            'valDate' => $this->val_date,
            'description' => $this->description,
            'isActive' => $this->is_active
        ];
    }
}

