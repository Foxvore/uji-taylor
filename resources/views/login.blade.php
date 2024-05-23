@extends('layout.main')

@section('content')
<div class="login-page">
    <div class="card-login">
        <div>
            <a href="/" style="text-decoration: none; color: black">
                <i class="fa-solid fa-arrow-left"></i>&nbsp;Kembali
            </a>
        </div>
        <div class="mx-4 mt-4">

            <div class="mb-3"><img src="img/Logo.png" alt="logo" style="width: 7rem"></div>
            <div class="fs-4 mb-1">Masuk ke akunmu</div>
            <div class="fw-light">Untuk memanajemen data anda perlu masuk  terlebih dahulu</div>
            <div class="my-4">
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="tombol-submit-login btn">Submit</button>
                  </form>
            </div>
        </div>

    </div>
</div>
@endsection