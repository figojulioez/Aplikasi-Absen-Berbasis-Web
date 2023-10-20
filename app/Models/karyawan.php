<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function scopeDetail ($query, $data) {
        $query->when($data ?? false, function ($query, $data) {
            return 
            $query->where('nama','like','%' . $data . '%');

        });
    }

    public function scopeCheck ($query, $data) {
        $query->when($data ?? false, function ($query, $data) {
            return $query->where('id',$data);

        });   
    }

}

