<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Candidate extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'candidate_id' => $this->id,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'full_name' => $this->full_name,
            'dob' => $this->dob,
            'pob' => $this->pob,
            'gender' => $this->gender,
            'year_exp' => $this->year_exp,
            'last_salary' => $this->last_salary,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
