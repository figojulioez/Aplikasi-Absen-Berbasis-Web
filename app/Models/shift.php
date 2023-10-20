<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\karyawan;

class shift extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function karyawan () : BelongsTo
    {
        return $this->BelongsTo(karyawan::class);
    }

    public function scopeDetail ($query, $data = '') {
        $query->when($data ?? false, function ($query, $data) {
            return $query->whereHas('karyawan', function ($query) use ($data) {
                $query->where('nama','like','%' . $data . '%');
            });
        });
    }
}
