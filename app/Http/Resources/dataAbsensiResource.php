<?php

namespace App\Http\Resources;

use App\Http\Resources\karyawanResources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\karyawan;

class dataAbsensiResource extends JsonResource
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
            'karyawan' => $this->karyawan ,
            'karyawan_id' => $this->karyawan_id,
            'status' => $this->status
        ];
    }
}
