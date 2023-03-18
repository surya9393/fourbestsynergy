@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 24rem;">
                    <div class="card-header text-center ">
                        <h5 class="card-title">Login</h5>
                    </div>
                    <div class="card-body text-center">
                        <form action="/login" method="POST">
                            @csrf
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
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password" class="form-control" required />
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary" value="Sign In">
                            </div>
                        </form>
                        <div class="mt-4">
                            <p>Belum punya akun? <a href="/register">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
