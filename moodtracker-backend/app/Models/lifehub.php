<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lifehub extends Model
{
    protected $table = 'lifehubs';

    protected $fillable = ['kegiatan', 'kategori', 'tanggal'];
}