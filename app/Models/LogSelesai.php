<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSelesai extends Model
{
    use HasFactory;
    protected $table = 'log_selesai';
    protected $primaryKey = 'id_log';
    protected $fillable = [
        'pesanan_id',
        'keterangan',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id_pesanan');
    }
}
