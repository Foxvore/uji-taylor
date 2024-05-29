<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\LogSelesai;
use Illuminate\Http\Request;

class AdminController
{
    public function dashboard()
    {
        $pemasukan_pembuatan = Kategori::where('id_kategori', 1)->value('total_pemasukan');
        $pemasukan_vermak = Kategori::where('id_kategori', 2)->value('total_pemasukan');

        $jumlah_pembuatan = LogSelesai::whereHas('pesanan', function ($query) {
            $query->where('kategori_id', 1);
        })->with('pesanan')->get()->count();

        $jumlah_vermak = LogSelesai::whereHas('pesanan', function ($query) {
            $query->where('kategori_id', 2);
        })->with('pesanan')->get()->count();
        
        $dummy_data = Pesanan::all();

        // return response()->json();

        return view('dashboard', [
            'p_pembuatan' => $pemasukan_pembuatan,
            'p_vermak' => $pemasukan_vermak,
            'j_pembuatan' => $jumlah_pembuatan,
            'j_vermak' => $jumlah_vermak,
            'data' => $dummy_data,
        ]);
    }

    public function pesanan()
    {

        $uncompleted_order = Pesanan::where('status_selesai', false)->get();
        $completed_order = Pesanan::where('status_selesai', true)->get();

        return view('pesanan', [
            'uo' => $uncompleted_order,
            'co' => $completed_order,
        ]);
    }
}
