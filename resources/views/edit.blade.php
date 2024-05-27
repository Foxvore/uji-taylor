@extends('layout.main')
@section('content')

<div
    class="bg-polos"
    style="display: flex; align-items: center; justify-content: center"
>
    <div class="card-tambah">
        <div class="title-tambah fw-bold fs-2">Edit Pesanan</div>
        <hr />
        <form action="">
            <div class="d-flex mb-3">
                <div style="width: 100%" class="me-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" id="inputNama" class="form-control" />
                </div>
                <div style="width: 100%" class="ms-3">
                    <label for="inputKategori" class="form-label"
                        >Kategori</label
                    >
                    <input
                        type="text"
                        id="inputKategori"
                        class="form-control"
                    />
                </div>
            </div>
            <div class="d-flex mb-3">
                <div style="width: 100%" class="me-3">
                    <label for="inputPesanan" class="form-label">Pesanan</label>
                    <input type="text" id="inputPesanan" class="form-control" />
                </div>
                <div style="width: 100%" class="ms-3">
                    <label for="inputHarga" class="form-label">Harga</label>
                    <input type="text" id="inputHarga" class="form-control" />
                </div>
            </div>
            <div class="mb-4">
                <label for="inputCatatan" class="form-label">Catatan</label>
                <textarea
                    name=""
                    id="inputCatatan"
                    class="form-control"
                ></textarea>
            </div>
            <button
                class="btn"
                style="width: 100%; background-color: var(--color-4)"
            >
                Konfirmasi
            </button>
        </form>
    </div>
</div>
@endsection
