{{-- @dd($pesanan) --}}
@extends('layout.main')

@section('content')
<div
    class="bg-polos"
    style="display: flex; align-items: center; justify-content: center"
>
<div class="card-tambah">
        @if ($pesanan == null)
            <div>
                <div class="d-flex justify-content-between">
                    <div class="title-tambah fw-bold fs-2">Tidak ada pesanan</div>
                    <a href="/">
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </a>
                </div>
                <div class="title-tambah fs-4">Kode pesanan yang kamu cari tidak ditemukan</div>

            </div>
        @else
            <div class="d-flex justify-content-between">
                @if ($pesanan->status_selesai == true)   
                    <div class="title-tambah fw-bold fs-2">Pesananmu sudah selesai</div>
                @elseif ($pesanan->status_selesai == false)
                    <div class="title-tambah fw-bold fs-2">Pesananmu belum selesai</div> 
                @endif
                <div>
                    <a href="/">
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </a>
                </div>
                </div>
                @if ($pesanan->status_selesai == true)
                    <div class="title-tambah fs-4">Pesanan dengan deskripsi dibawah sudah dapat diambil</div>
                @elseif ($pesanan->status_selesai == false)
                    <div class="title-tambah fs-4">Mohon menunggu, pesananmu yang ini belum selesai</div> 
                @endif
                <hr />
            
                <div style="width: 100%" class="mb-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" id="inputNama" class="form-control" value="{{ $pesanan->nama_pemesan }}" readonly>
                </div>
                <div class="d-flex mb-3">
                    <div style="width: 100%" class="me-3">
                        <label for="inputKode" class="form-label">Kode Pesanan</label>
                        <input type="text" id="inputKode" class="form-control" value="{{ $pesanan->kode_pesanan }}" readonly/>
                </div>
                <div style="width: 100%" class="ms-3">
                    <label for="inputKategori" class="form-label"
                        >Kategori</label
                    >
                    <input type="text" id="inputKategori" class="form-control" value="{{ $pesanan->kategori_id == 1 ? 'Jahit' : 'Vermak' }}" readonly>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div style="width: 100%" class="me-3">
                    <label for="inputDate" class="form-label">Estimasi</label>
                    <input type="date" id="inputDate" class="form-control" value="{{ $pesanan->estimasi }}" readonly/>
                </div>
                <div style="width: 100%" class="ms-3">
                    <label for="inputHarga" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="inputHarga" class="form-control" value="{{ $pesanan->harga }}" readonly/>
                    </div>
                </div>
            </div>
            <div style="width: 100%" class="mb-4">
                    <label for="inputCatatan" class="form-label">Catatan</label>
                    <textarea
                        name=""
                        id="inputCatatan"
                        class="form-control"
                        readonly
                    >{{ $pesanan->notes }}</textarea>
            </div>
        @endif
        
        
    </div>
</div>
@endsection