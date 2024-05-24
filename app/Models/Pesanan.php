<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 't_pesanan';
    protected $fillable = [
        'kategori_id',
        'nama_pemesan',
        'kontak',
        'harga',
        'referensi',
        'notes',
        'status_selesai',
        'tanggal_pesanan',
        'estimasi',
    ];
}
