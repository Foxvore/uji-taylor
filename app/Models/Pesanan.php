<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 't_pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = [
        'kategori_id',
        'kode_pesanan',
        'nama_pemesan',
        'kontak',
        'harga',
        'notes',
        'status_selesai',
        'estimasi',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($pesanan) {
            $currentDate = now()->timezone('Asia/Jakarta')->format('d-m-Y');
            $keterangan = 'Pesanan ' . $pesanan->nama_pemesan . ' selesai pada ' . $currentDate;

            if ($pesanan->isDirty('status_selesai') && $pesanan->status_selesai) {
                LogSelesai::insert([
                    'pesanan_id' => $pesanan->id_pesanan,
                    'keterangan' => $keterangan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $kategori = $pesanan->kategori;
                if ($kategori) {
                    $kategori->increment('total_pemasukan', $pesanan->harga);
                }
            }
        });
    }

    public function logs()
    {
        return $this->hasMany(LogSelesai::class, 'pesanan_id', 'id_pesanan');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}
