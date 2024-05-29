@extends('layout.main')

@section('content')
    <x-navbar-admin></x-navbar-admin>
    <div class="bg-polos d-flex">
        <div class="ringkasan">
            <div class="fs-2" style="font-weight: 500">Ringkasan</div>
            <div class="card-ringkasan d-flex flex-column justify-content-center">
                <div class="fs-2 text-white d-flex" style="font-weight: 500">
                    <div class="me-3">{{ $j_pembuatan }}</div>
                    <div class="me-3 fw-light">|</div>
                    <div>Rp. {{ number_format($p_pembuatan, 0, ',', '.') }}</div>
                </div>
                <div class="fs-2 text-white fw-light">Total Jahit</div>
            </div>
            <div class="card-ringkasan d-flex flex-column justify-content-center">
                <div class="fs-2 text-white d-flex" style="font-weight: 500">
                    <div class="me-3">{{ $j_vermak }}</div>
                    <div class="me-3 fw-light">|</div>
                    <div>Rp. {{ number_format($p_vermak, 0, ',', '.') }}</div>
                </div>
                <div class="fs-2 text-white fw-light">Total Vermak</div>
            </div>
            <div class="card-ringkasan d-flex flex-column justify-content-center">
                <div class="fs-2 text-white d-flex" style="font-weight: 500">
                    <div class="me-3">{{ $j_pembuatan + $j_vermak }}</div>
                    <div class="me-3 fw-light">|</div>
                    <div>Rp. {{ number_format($p_pembuatan + $p_vermak, 0, ',', '.') }}</div>
                </div>
                <div class="fs-2 text-white fw-light">Total Pendapatan Kotor</div>
            </div>

        </div>
        <div class="tabel-histori">
            <div class="fs-2" style="font-weight: 500">Histori Pemesanan</div>
            <div class="tabel-dumb">
                <table id="pesanan-table" class="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Kategori</th>
                            <th>Pesanan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i<5; $i++)   
                        <tr>
                           <td>disini nomoronya</td>
                           <td>Nanti namanya disin</td>
                           <td>kontaknya disini</td>
                           <td>kategorinya disini</td>
                           <td>pesanannyadisini</td>
                           <td>ini button niatnya</td> 
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
