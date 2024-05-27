@extends('layout.main')

@section('content')
<x-navbar-admin></x-navbar-admin>
<div class="bg-polos d-flex">
    <div class="ringkasan">
        <div class="fs-2" style="font-weight: 500">Ringkasan</div>
        <div class="card-ringkasan d-flex flex-column justify-content-center">
            <div class="fs-2 text-white d-flex" style="font-weight: 500">
                <div class="me-3">00</div>
                <div class="me-3 fw-light">|</div>
                <div>Rp. 300.000</div>
            </div>
            <div class="fs-2 text-white fw-light">Total Jahit</div>
        </div>
        <div class="card-ringkasan d-flex flex-column justify-content-center">
            <div class="fs-2 text-white d-flex" style="font-weight: 500">
                <div class="me-3">00</div>
                <div class="me-3 fw-light">|</div>
                <div>Rp. 300.000</div>
            </div>
            <div class="fs-2 text-white fw-light">Total Vermak</div>
        </div>
        <div class="card-ringkasan d-flex flex-column justify-content-center">
            <div class="fs-2 text-white d-flex" style="font-weight: 500">
                <div class="me-3">00</div>
                <div class="me-3 fw-light">|</div>
                <div>Rp. 300.000</div>
            </div>
            <div class="fs-2 text-white fw-light">Total Pendapatan Kotor</div>
        </div>
    
    </div>
    <div class="tabel-histori">
        <div class="fs-2" style="font-weight: 500">Histori Pemesanan</div>
        <div class="tabel-dumb">Ini tabel nanti gatau kalo gada datanya gimana</div>
    </div>

</div>
@endsection