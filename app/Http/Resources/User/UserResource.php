<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Employee\EmployeeLiteResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            // 'name' => $this->first_name. " " .$this->last_name,
            'name' => $this->name,
            'user_name' => $this->user_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'code' => $this->invite_code,
            'active' => $this->active,
            'any_device' => $this->any_device,
            'expire_date' => Carbon::parse($this->created_at)->addYear(1)->diffInDays(Carbon::now()).' days',
            'created' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'roles' => RoleResource::collection($this->roles),
            //'permissions' => GeneralIdNameResource::collection($this->getAllPermissions()),
            'permissions' => $this->getAllPermissions()->pluck('name'),
            'Employee' => new EmployeeLiteResource($this->Employee),
        ];
    }
}
