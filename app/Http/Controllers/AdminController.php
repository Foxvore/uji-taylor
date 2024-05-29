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
        $jahit = Kategori::where('id_kategori', 1)->first();
        $vermak = Kategori::where('id_kategori', 2)->first();

        $jumlah_jahit = LogSelesai::whereHas('pesanan', function ($query) {
            $query->where('kategori_id', 1);
        })->with('pesanan')->get()->count();

        $jumlah_vermak = LogSelesai::whereHas('pesanan', function ($query) {
            $query->where('kategori_id', 2);
        })->with('pesanan')->get()->count();
        
        $dummy_data = Pesanan::all();

        // return response()->json($jahit->total_pemasukan);

        return view('dashboard', [
            'jahit' => $jahit,
            'vermak' => $vermak,
            'j_jahit' => $jumlah_jahit,
            'j_vermak' => $jumlah_vermak,
            'data' => $dummy_data,
        ]);
    }

    public function getPesanan()
    {

        $uncompleted_order_jahit = Pesanan::where('status_selesai', false)
            ->where('kategori_id', 1)
            ->with('kategori')
            ->get();

        $completed_order_jahit = Pesanan::where('status_selesai', true)
            ->where('kategori_id', 1)
            ->with('kategori')
            ->get();

        $uncompleted_order_vermak = Pesanan::where('status_selesai', false)
            ->where('kategori_id', 2)
            ->with('kategori')
            ->get();

        $completed_order_vermak = Pesanan::where('status_selesai', true)
            ->where('kategori_id', 2)
            ->with('kategori')
            ->get();

        // return response()->json($uncompleted_order_jahit);

        return view('pesanan', [
            'uoj' => $uncompleted_order_jahit,
            'coj' => $completed_order_jahit,
            'uov' => $uncompleted_order_vermak,
            'cov' => $completed_order_vermak,
        ]);
    }
}
