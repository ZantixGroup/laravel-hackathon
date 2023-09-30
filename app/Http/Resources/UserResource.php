<?php

namespace App\Http\Resources;

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
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            's_level' => $this->s_level,
            't_level' => $this->t_level,
            'e_level' => $this->e_level,
            'm_level' => $this->m_level,
            'score' => $this->score,
            'avatar' => $this->avatar,
        ];
    }
}
