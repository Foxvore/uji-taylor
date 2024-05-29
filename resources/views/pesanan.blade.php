@extends('layout.main')

@section('content')
    <x-navbar-admin></x-navbar-admin>
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
                                        <a href="#" class="me-2">
                                            <button class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <a href="#" class="me-2">
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-success">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
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
                                    Rp. {{ number_format($uov->harga, 0, ',', '.') }}
                                </div>
                                <div class="d-flex me-3">
                                    <a href="#" class="me-2">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <a href="#" class="me-2">
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
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
