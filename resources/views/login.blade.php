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
                <div class="fw-light">Untuk memanajemen data anda perlu masuk terlebih dahulu</div>
                <div class="my-4">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Pengguna</label>
                            <input type="username" class="form-control" id="exampleInputUsername1"
                                aria-describedby="usernameHelp" name="username">
                            @if ($errors->has('username'))
                                <div>
                                    {{ $errors->first('username') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            @if ($errors->has('password'))
                                <div>
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="tombol-submit-login btn">Submit</button>
                        @if (session('error'))
                            <div>
                                {{ session('error') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
