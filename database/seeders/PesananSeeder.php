<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Pesanan;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $categories = Kategori::pluck('id_kategori')->toArray();
        $prefix = 'PES-';
        $createdAt = Carbon::today()->toDateString();
        $updatedAt = Carbon::today()->toDateString();

        for ($i = 0; $i <= 5; $i++) {
            Pesanan::insert([
                'kategori_id' => $faker->randomElement($categories),
                'kode_pesanan' => $prefix . $i + 1,
                'nama_pemesan' => $faker->name,
                'kontak' => $faker->phoneNumber,
                'harga' => $faker->numberBetween(10000, 100000),
                'notes' => $faker->paragraph,
                'status_selesai' => false,
                'tanggal_pesanan' => $faker->date,
                'estimasi' => $faker->date,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
