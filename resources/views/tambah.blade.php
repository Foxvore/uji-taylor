@extends('layout.main')

@section('content')
    <x-navbar-admin></x-navbar-admin>
    <div class="bg-polos" style="display: flex; align-items: center; justify-content: center">
        <div class="card-tambah">
            <div class="title-tambah fw-bold fs-2">Tambah Pesanan</div>
            <hr />
            <form action="{{ route('pesanan.store') }}" method="POST">
                @csrf
                <div style="width: 100%" class="mb-3">
                    <label for="inputNama" class="form-label">Nama Pemesan</label>
                    <input type="text" id="inputNama" class="form-control" name="nama_pemesan">
                </div>
                <div class="d-flex mb-3">
                    <div style="width: 100%" class="me-3">
                        <label for="inputKode" class="form-label">Kontak</label>
                        <input type="text" id="inputKode" class="form-control" name="kontak" />
                    </div>
                    <div style="width: 100%" class="ms-3">
                        <label for="inputKategori" class="form-label">Kategori</label>
                        <select id="inputKategori" class="form-select" name="kategori_id">
                            <option value="1">Jahit</option>
                            <option value="2">Vermak</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div style="width: 100%" class="me-3">
                        <label for="inputDate" class="form-label">Estimasi</label>
                        <input type="date" id="inputDate" class="form-control" name="estimasi" />
                    </div>
                    <div style="width: 100%" class="ms-3">
                        <label for="inputHarga" class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" id="inputHarga" class="form-control" name="harga" />
                        </div>
                    </div>
                </div>
                <div style="width: 100%" class="mb-4">
                    <label for="inputCatatan" class="form-label">Catatan</label>
                    <textarea id="inputCatatan" class="form-control" name="notes"></textarea>
                </div>
                <input type="submit" value="Konfirmasi" class="btn"
                    style="width: 100%; background-color: var(--color-4)" />
            </form>
        </div>
    </div>
@endsection
