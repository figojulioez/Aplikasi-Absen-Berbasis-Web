<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\karyawan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class laporan extends Model
{
    use HasFactory;

    
    protected $guarded = ['id'];

    public function karyawan () : BelongsTo
    {
        return $this->BelongsTo(karyawan::class);
    }
}
