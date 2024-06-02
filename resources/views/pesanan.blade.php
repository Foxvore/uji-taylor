@extends('layout.main')

@section('content')
    <x-navbar-admin></x-navbar-admin>

    @if (session('success'))
        <script>
            alert({{ session('success') }})
        </script>
    @endif

    @if (session('error'))
        <script>
            alert({{ session('error') }})
        </script>
    @endif

    <div class="bg-polos">
        <div class="isi d-flex justify-content-center">
            <div>
                <input type="radio" name="radio-milih" id="pilihan1" value="jahit" checked>
                <label class="label px-5 py-2 fs-4" for="pilihan1">Jahit</label>
            </div>
            <div class="px-3"></div>
            <div>
                <input type="radio" name="radio-milih" value="vermak" id="pilihan2">
                <label class="label px-5 py-2 fs-4" for="pilihan2">Vermak</label>
            </div>
        </div>
        <div class="isi-card">
            <div id="section-jahit" style="display: none">
                <div class="card-belum">
                    <div class="slide">
                        @foreach ($uoj as $uoj)
                            <div class="kartu">
                                <div class="d-flex justify-content-end align-items-end pt-2 pe-2">
                                    <div class="me-2">
                                        Status: belum selesai
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 21 21" fill="none">
                                        <circle cx="10.5" cy="10.5" r="10.5" fill="#F65959" />
                                    </svg>
                                </div>
                                <div class="d-flex" style="height: 9rem">
                                    <div class="card-kiri ps-4">
                                        <div class="fs-2 semi-bold text-nowrap"
                                            style="width: 115px; text-overflow: ellipsis; overflow: hidden;">
                                            {{ $uoj->nama_pemesan }}
                                        </div>
                                        <div class="light text-capitalize">Kode Pesanan</div>
                                        <div class="d-flex pt-2">
                                            <i class="fa-solid fa-shirt"></i>
                                            <div class="ps-1">{{ $uoj->kode_pesanan }}</div>
                                        </div>
                                        <div class="light pt-1">Estimasi</div>
                                        <div class="d-flex pt-2">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <div class="ps-1">{{ $uoj->estimasi }}</div>
                                        </div>
                                    </div>
                                    <div class="card-kanan">
                                        <div>Catatan:</div>
                                        <div class="catatan me-3 mt-1">
                                            <div class="isi-catatan">{{ $uoj->notes }}</div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-3 my-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="ps-4 fs-4">
                                        Rp. {{ number_format($uoj->harga, 0, ',', '.') }}
                                    </div>
                                    <div class="d-flex me-3">
                                        <a href="{{ route('pesanan.destroy', $uoj->id_pesanan) }}"
                                            onClick="return confirm('Ingin hapus pesanan?')" class="me-2">
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-warning me-2" style="color: white"
                                            data-bs-toggle="modal" data-bs-target="#detailModal{{ $uoj->id_pesanan }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="{{ route('pesanan.complete', $uoj->id_pesanan) }}"
                                            onClick="return confirm('Pesana sudah selesai?')">
                                            <button class="btn btn-success">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- modal --}}
                            <div class="modal fade" id="detailModal{{ $uoj->id_pesanan }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="color: black">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-2" id="exampleModalLabel">Edit Pesanan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pesanan.update', $uoj->id_pesanan) }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="inputNama" class="form-label">Nama Pemesan</label>
                                                    <input type="text" id="inputNama" class="form-control"
                                                        name="nama_pemesan" value="{{ $uoj->nama_pemesan }}">
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <div style="width: 100%" class="me-3">
                                                        <label for="inputKode" class="form-label">Kontak</label>
                                                        <input type="text" id="inputKode" class="form-control"
                                                            name="kontak" value="{{ $uoj->kontak }}" />
                                                    </div>
                                                    <div style="width: 100%" class="ms-3">
                                                        <label for="inputKategori" class="form-label">Kategori</label>
                                                        <select id="inputKategori" class="form-select"
                                                            name="kategori_id">
                                                            <option value="1"
                                                                {{ $uoj->kategori_id == 1 ? 'selected' : '' }}>Jahit
                                                            </option>
                                                            <option value="2"
                                                                {{ $uoj->kategori_id == 2 ? 'selected' : '' }}>Vermak
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <div style="width: 100%" class="me-3">
                                                        <label for="inputDate" class="form-label">Estimasi</label>
                                                        <input type="date" id="inputDate" class="form-control"
                                                            value="{{ $uoj->estimasi }}" name="estimasi" />
                                                    </div>
                                                    <div style="width: 100%" class="ms-3">
                                                        <label for="inputHarga" class="form-label">Harga</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="text" id="inputHarga" class="form-control"
                                                                value="{{ $uoj->harga }}" name="harga" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="inputCatatan" class="form-label">Catatan</label>
                                                    <textarea id="inputCatatan" class="form-control" name="notes">{{ $uoj->notes }}</textarea>
                                                </div>
                                                <input type="submit" class="btn" value="Konfirmasi"
                                                    style="width: 100%; background-color: var(--color-4); color: white">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal --}}
                        @endforeach
                    </div>
                </div>
                <div class="card-sudah">
                    <div class="slide">
                        @foreach ($coj as $coj)
                            <div class="kartu">
                                <div class="d-flex justify-content-end align-items-end pt-2 pe-2">
                                    <div class="me-2">
                                        Status: sudah selesai
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 21 21" fill="none">
                                        <circle cx="10.5" cy="10.5" r="10.5" fill="#ABF373" />
                                    </svg>
                                </div>
                                <div class="d-flex" style="height: 9rem">
                                    <div class="card-kiri ps-4">
                                        <div class="fs-2 semi-bold text-nowrap"
                                            style="width: 115px; text-overflow: ellipsis; overflow: hidden;">
                                            {{ $coj->nama_pemesan }}
                                        </div>
                                        <div class="light text-capitalize">Kode Pesanan</div>
                                        <div class="d-flex pt-2">
                                            <i class="fa-solid fa-shirt"></i>
                                            <div class="ps-1">{{ $coj->kode_pesanan }}</div>
                                        </div>
                                        <div class="light pt-1">Estimasi</div>
                                        <div class="d-flex pt-2">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <div class="ps-1">{{ $coj->estimasi }}</div>
                                        </div>
                                    </div>
                                    <div class="card-kanan">
                                        <div>Catatan:</div>
                                        <div class="catatan me-3 mt-1">
                                            <div class="isi-catatan">{{ $coj->notes }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mx-3 my-3">
                            <div class="ps-4 fs-4">
                                Rp. {{ number_format($uoj->harga, 0, ',', '.') }}
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="section-vermak" style="display: none">
            <div class="card-belum">
                <div class="slide">
                    @foreach ($uov as $uov)
                        <div class="kartu">
                            <div class="d-flex justify-content-end align-items-end pt-2 pe-2">
                                <div class="me-2">
                                    Status: belum selesai
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 21 21" fill="none">
                                    <circle cx="10.5" cy="10.5" r="10.5" fill="#F65959" />
                                </svg>
                            </div>
                            <div class="d-flex" style="height: 9rem">
                                <div class="card-kiri ps-4">
                                    <div class="fs-2 semi-bold text-nowrap"
                                        style="width: 115px; text-overflow: ellipsis; overflow: hidden;">
                                        {{ $uov->nama_pemesan }}
                                    </div>
                                    <div class="light text-capitalize">Kode Pesanan</div>
                                    <div class="d-flex pt-2">
                                        <i class="fa-solid fa-shirt"></i>
                                        <div class="ps-1">{{ $uov->kode_pesanan }}</div>
                                    </div>
                                    <div class="light pt-1">Estimasi</div>
                                    <div class="d-flex pt-2">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <div class="ps-1">{{ $uov->estimasi }}</div>
                                    </div>
                                </div>
                                <div class="card-kanan">
                                    <div>Catatan:</div>
                                    <div class="catatan me-3 mt-1">
                                        <div class="isi-catatan">{{ $uov->notes }}</div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mx-3 my-3">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="ps-4 fs-4">
                                    Rp. {{ number_format($uoj->harga, 0, ',', '.') }}
                                </div>
                                <div class="d-flex me-3">
                                    <a href="{{ route('pesanan.destroy', $uov->id_pesanan) }}"
                                        onClick="return confirm('Ingin hapus pesanan?')" class="me-2">
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-warning me-2" style="color: white"
                                        data-bs-toggle="modal" data-bs-target="#detailModal{{ $uov->id_pesanan }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <a href="{{ route('pesanan.complete', $uov->id_pesanan) }}"
                                        onClick="return confirm('Pesana sudah selesai?')">
                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- modal --}}
                        <div class="modal fade" id="detailModal{{ $uov->id_pesanan }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="color: black">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-2" id="exampleModalLabel">Edit Pesanan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pesanan.update', $uov->id_pesanan) }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="inputNama" class="form-label">Nama Pemesan</label>
                                                <input type="text" id="inputNama" class="form-control"
                                                    name="nama_pemesan" value="{{ $uov->nama_pemesan }}">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <div style="width: 100%" class="me-3">
                                                    <label for="inputKode" class="form-label">Kontak</label>
                                                    <input type="text" id="inputKode" class="form-control"
                                                        name="kontak" value="{{ $uov->kontak }}" />
                                                </div>
                                                <div style="width: 100%" class="ms-3">
                                                    <label for="inputKategori" class="form-label">Kategori</label>
                                                    <select id="inputKategori" class="form-select" name="kategori_id">
                                                        <option value="1"
                                                            {{ $uov->kategori_id == 1 ? 'selected' : '' }}>Jahit
                                                        </option>
                                                        <option value="2"
                                                            {{ $uov->kategori_id == 2 ? 'selected' : '' }}>Vermak
                                                        </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <div style="width: 100%" class="me-3">
                                                    <label for="inputDate" class="form-label">Estimasi</label>
                                                    <input type="date" id="inputDate" class="form-control"
                                                        value="{{ $uov->estimasi }}" name="estimasi" />
                                                </div>
                                                <div style="width: 100%" class="ms-3">
                                                    <label for="inputHarga" class="form-label">Harga</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" id="inputHarga" class="form-control"
                                                            value="{{ $uov->harga }}" name="harga" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="inputCatatan" class="form-label">Catatan</label>
                                                <textarea id="inputCatatan" class="form-control" name="notes">{{ $uov->notes }}</textarea>
                                            </div>
                                            <input type="submit" class="btn" value="Konfirmasi"
                                                style="width: 100%; background-color: var(--color-4); color: white">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal --}}
                    @endforeach
                </div>
            </div>
            <div class="card-sudah">
                <div class="slide">
                    @foreach ($cov as $cov)
                        <div class="kartu">
                            <div class="d-flex justify-content-end align-items-end pt-2 pe-2">
                                <div class="me-2">
                                    Status: sudah selesai
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 21 21" fill="none">
                                    <circle cx="10.5" cy="10.5" r="10.5" fill="#ABF373" />
                                </svg>
                            </div>
                            <div class="d-flex" style="height: 9rem">
                                <div class="card-kiri ps-4">
                                    <div class="fs-2 semi-bold">Buyer</div>
                                    <div class="light ">Vermak</div>
                                    <div class="d-flex pt-2">
                                        <i class="fa-solid fa-shirt"></i>
                                        <div class="ps-1">Baju Lebaran</div>
                                    </div>
                                    <div class="light pt-1">Estimasi</div>
                                    <div class="d-flex pt-2">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <div class="ps-1">10/10/2100</div>
                                    </div>
                                </div>
                                <div class="card-kanan">
                                    <div>Catatan:</div>
                                    <div class="catatan me-3 mt-1">
                                        <div class="isi-catatan">Misalnya ini panjang panjangMisalnya ini panjang
                                            panjangMisalnya ini panjang panjangMisalnya ini panjang panjangMisalnya ini
                                            panjang panjangMisalnya ini panjang panjangMisalnya ini panjang anjangMisalnya
                                            ini panjang panjangMisalnya ini panjang panjangMisalnya ini panjang
                                            panjangMisalnya ini panjang anjangMisalnya ini panjang panjangMisalnya ini
                                            panjang panjangMisalnya ini panjang panjangMisalnya ini panjang anjangMisalnya
                                            ini panjang panjangMisalnya ini panjang panjangMisalnya ini panjang
                                            panjangMisalnya ini panjang anjangMisalnya ini panjang panjangMisalnya ini
                                            panjang panjangMisalnya ini panjang panjangMisalnya ini panjang anjangMisalnya
                                            ini panjang panjangMisalnya ini panjang panjangMisalnya ini panjang
                                            panjangMisalnya ini panjang anjangMisalnya ini panjang panjangMisalnya ini
                                            panjang panjangMisalnya ini panjang panjangMisalnya ini panjang panjangMisalnya
                                            ini panjang panjangMisalnya ini panjang panjang</div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mx-3 my-3">
                            <div class="pb-3 ps-4 fs-4">
                                Rp. 34.000
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleSections() {
                var jahitSection = document.getElementById('section-jahit');
                var vermakSection = document.getElementById('section-vermak');
                var selectedValue = document.querySelector('input[name="radio-milih"]:checked').value;

                if (selectedValue === 'jahit') {
                    jahitSection.style.display = 'block';
                    vermakSection.style.display = 'none';
                } else if (selectedValue === 'vermak') {
                    jahitSection.style.display = 'none';
                    vermakSection.style.display = 'block';
                }
            }

            var radios = document.querySelectorAll('input[name="radio-milih"]');
            radios.forEach(function(radio) {
                radio.addEventListener('change', toggleSections);
            });

            toggleSections();
        });
    </script>
@endsection
