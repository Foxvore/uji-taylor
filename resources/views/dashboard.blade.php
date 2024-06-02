{{-- @dd($data) --}}
@extends('layout.main')

@section('content')
    <x-navbar-admin></x-navbar-admin>
    <div class="bg-polos d-flex">
        <div class="ringkasan">
            <div class="fs-2" style="font-weight: 500">Ringkasan</div>
            <div class="card-ringkasan d-flex flex-column justify-content-center">
                <div class="fs-2 text-white d-flex" style="font-weight: 500">
                    <div class="me-3">{{ $j_jahit }}</div>
                    <div class="me-3 fw-light">|</div>
                    <div>Rp. {{ number_format($jahit->total_pemasukan, 0, ',', '.') }}</div>
                </div>
                <div class="fs-2 text-white fw-light text-capitalize">Total {{ $jahit->nama_kategori }}</div>
            </div>
            <div class="card-ringkasan d-flex flex-column justify-content-center">
                <div class="fs-2 text-white d-flex" style="font-weight: 500">
                    <div class="me-3">{{ $j_vermak }}</div>
                    <div class="me-3 fw-light">|</div>
                    <div>Rp. {{ number_format($vermak->total_pemasukan, 0, ',', '.') }}</div>
                </div>
                <div class="fs-2 text-white fw-light text-capitalize">Total {{ $vermak->nama_kategori }}</div>
            </div>
            <div class="card-ringkasan d-flex flex-column justify-content-center">
                <div class="fs-2 text-white d-flex" style="font-weight: 500">
                    <div class="me-3">{{ $j_jahit + $j_vermak }}</div>
                    <div class="me-3 fw-light">|</div>
                    <div>Rp. {{ number_format($jahit->total_pemasukan + $vermak->total_pemasukan, 0, ',', '.') }}</div>
                </div>
                <div class="fs-2 text-white fw-light text-capitalize">Total Pendapatan Kotor</div>
            </div>

        </div>
        <div class="tabel-histori">
            <div class="fs-2" style="font-weight: 500">Histori Pemesanan</div>
            <div class="tabel-dumb">
                <table id="pesanan-table" class="table stripe hover" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Tanggal Selesai</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $data->nama_pemesan }}</td>
                           <td>{{ $data->kontak }}</td>
                           <td>{{ $data->estimasi }}</td>
                           <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $data->id_pesanan }}">
                                    Detail
                                </button>
                            </td> 
                        </tr>
                        {{-- modal --}}
                        <div class="modal fade" id="detailModal{{ $data->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-2" id="exampleModalLabel">Detail Pesanan</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex mb-3">
                                        <div style="width: 100%" class="me-3">
                                            <label for="inputNama" class="form-label">Nama</label>
                                            <input type="text" id="inputNama" class="form-control" readonly/>
                                        </div>
                                        <div style="width: 100%" class="ms-3">
                                            <label for="inputKategori" class="form-label"
                                                >Kategori</label
                                            >
                                            <input
                                                type="text"
                                                id="inputKategori"
                                                class="form-control"
                                                readonly
                                            />
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div style="width: 100%" class="me-3">
                                            <label for="inputPesanan" class="form-label">Kode Pesanan</label>
                                            <input type="text" id="inputPesanan" class="form-control" readonly/>
                                        </div>
                                        <div style="width: 100%" class="ms-3">
                                            <label for="inputHarga" class="form-label">Harga</label>
                                            <input type="text" id="inputHarga" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="inputCatatan" class="form-label">Catatan</label>
                                        <textarea
                                            name=""
                                            id="inputCatatan"
                                            class="form-control"
                                            readonly
                                        ></textarea>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          {{-- modal --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
