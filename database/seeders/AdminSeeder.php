<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $createdAt = Carbon::today()->toDateString();
        $updatedAt = Carbon::today()->toDateString();

        User::insert([
            'name' => 'Foxvorism',
            'username' => 'maul',
            'password' => Hash::make('rahasia'),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);
    }
}
