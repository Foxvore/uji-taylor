<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSelesai extends Model
{
    use HasFactory;
    protected $table = 'log_selesai';
    protected $fillable = [
        'pesanan_id',
        'keterangan',
    ];
}
