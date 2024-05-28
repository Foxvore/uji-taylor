<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Validator;

class PesananController
{
    /**
     * Get all data from table t_pesanan.
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        dd($pesanan);
    }

    /**
     * Get data from table t_pesanan by kode_pesanan
     */
    public function getPesananByCode($kodePesanan)
    {
        $pesanan = Pesanan::where('kode_pesanan', $kodePesanan)->get();
        dd($pesanan);
    }

    /**
     * Get uncompleted data from table t_pesanan
     */
    public function getUncompletedPesanan()
    {
        $pesanan = Pesanan::where('status_selesai', false)->get();
        dd($pesanan);
    }

    /**
     * Get completed data from table t_pesanan
     */
    public function getCompletedPesanan()
    {
        $pesanan = Pesanan::where('status_selesai', true)
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        dd($pesanan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update pesanan's data by id_pesanan.
     */
    public function updateDataPesanan(Request $request, $id_pesanan)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:m_kategori,id_kategori',
            'kode_pesanan' => 'required|string|unique:t_pesanan,kode_pesanan,' . $id_pesanan . ',id_pesanan',
            'nama_pemesan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'harga' => 'required|integer',
            'notes' => 'nullable|string',
            'status_selesai' => 'required|boolean',
            'tanggal_pesanan' => 'required|date',
            'estimasi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Find the pesanan by id_pesanan
        $pesanan = Pesanan::findOrFail($id_pesanan);

        // Update the pesanan with new data
        $pesanan->kategori_id = $request->input('kategori_id');
        $pesanan->kode_pesanan = $request->input('kode_pesanan');
        $pesanan->nama_pemesan = $request->input('nama_pemesan');
        $pesanan->kontak = $request->input('kontak');
        $pesanan->harga = $request->input('harga');
        $pesanan->notes = $request->input('notes');
        $pesanan->status_selesai = $request->input('status_selesai');
        $pesanan->tanggal_pesanan = $request->input('tanggal_pesanan');
        $pesanan->estimasi = $request->input('estimasi');

        // Save the updated pesanan
        $pesanan->save();
        dd($pesanan);
    }

    /**
     * Complete pesanan by id_pesanan.
     */
    public function completePesanan($id_pesanan)
    {
        $pesanan = Pesanan::findOrFail($id_pesanan);

        $pesanan->kategori_id = $pesanan->kategori_id;
        $pesanan->kode_pesanan = $pesanan->kode_pesanan;
        $pesanan->nama_pemesan = $pesanan->nama_pemesan;
        $pesanan->kontak = $pesanan->kontak;
        $pesanan->harga = $pesanan->harga;
        $pesanan->notes = $pesanan->notes;
        $pesanan->status_selesai = true;
        $pesanan->tanggal_pesanan = $pesanan->tanggal_pesanan;
        $pesanan->estimasi = $pesanan->estimasi;

        $pesanan->save();
        dd($pesanan);
    }

    public function test()
    {
        $pesanan = Pesanan::findOrFail(1);

        $pesanan->kategori_id = $pesanan->kategori_id;
        $pesanan->kode_pesanan = $pesanan->kode_pesanan;
        $pesanan->nama_pemesan = $pesanan->nama_pemesan;
        $pesanan->kontak = $pesanan->kontak;
        $pesanan->harga = $pesanan->harga;
        $pesanan->notes = $pesanan->notes;
        $pesanan->status_selesai = true;
        $pesanan->tanggal_pesanan = $pesanan->tanggal_pesanan;
        $pesanan->estimasi = $pesanan->estimasi;

        $pesanan->save();
        dd($pesanan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
