<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class shiftResource extends JsonResource
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
            'karyawan_id' => $this->karyawan_id,
            'karyawan' => $this->karyawan,
            
            'jamShift' => $this->jamShift,
            'sesiShift' => $this->sesiShift
        ];
    }
}
