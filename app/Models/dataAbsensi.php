<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\karyawan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dataAbsensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function karyawan () : BelongsTo
    {
        return $this->BelongsTo(karyawan::class);
    }

    public function scopeDetail ($query, $data) {
        $query->when($data ?? false, function ($query, $data) {
            return $query->whereHas('karyawan', function ($query) use ($data) {
                $query->where('nama','like','%' . $data . '%');
            });
        });
    }

    public function scopeShow ($query, $data) {
            return $query->whereHas('karyawan', function ($query) use ($data) {
                $query->where('status','like','%' . $data . '%');

            });
    }

}
