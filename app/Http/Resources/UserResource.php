<?php

namespace App\Http\Resources;

use App\Models\Role;
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
            'second_name' => $this->second_name,
            'first_name' => $this->first_name,
            'patronymic' => $this->patronymic,
            'login' => $this->login,
            'email' => $this->email,
            'role' => new RoleResource(Role::find($this->role_id)),
        ];
    }
}
