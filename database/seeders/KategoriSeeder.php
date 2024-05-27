<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = Carbon::today()->toDateString();
        $updatedAt = Carbon::today()->toDateString();

        Kategori::insert([
            'nama_kategori' => 'pembuatan',
            'total_pemasukan' => 0,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);

        Kategori::insert([
            'nama_kategori' => 'vermak',
            'total_pemasukan' => 0,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);
    }
}
