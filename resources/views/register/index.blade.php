@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 24rem;">
                    <div class="card-header text-center ">
                        <h5 class="card-title">Formulir Pendaftaran</h5>
                    </div>
                    <div class="card-body text-center">
                        <form action="/register" method="POST">
                            @csrf
                            
                            <div class="form-outline mb-4">
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror" value="{{ old('name') }}"required />
                                <label class="form-label" for="name">Nama Lengkap</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-outline mb-4">
                                <input type="number" id="nip" name="nip"
                                    class="form-control @error('nip')
                                    is-invalid
                                @enderror" value="{{ old('nip') }}"required />
                                <label class="form-label" for="nip">Nomor Induk Pegawai</label>
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror" value="{{ old('email') }}"required />
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control" required />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
                                <input type="reset" class="btn btn-danger" value="Reset">
                                <input type="submit" class="btn btn-primary" value="Daftar">
                            </div>
                        </form>
                        <div class="mt-4">
                            <p>Sudah punya akun? <a href="/login">Masuk</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
