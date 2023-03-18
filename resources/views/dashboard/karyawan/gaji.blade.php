@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <a href="/rekapgaji" class="btn btn-success">Buat rekap gaji</a>
                <table class="table align-middle mb-0 bg-white">
                    <h1 class="text-center">Daftar hadir</h1>
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">Name</th>
                            <th>Datang</th>
                            <th>Pulang</th>
                            <th>Status Datang</th>
                            <th>Gaji / Hari</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($gajiPegawai as $presensi)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                            style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{ $presensi->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{ $presensi->tanggaldatang }} {{ $presensi->jamdatang }}</p>
                                </td>
                                <td>{{ $presensi->jampulang }}</td>
                                <td>
                                    @if ($presensi->jamdatang >= '08:05:00')
                                        <span class="badge badge-danger rounded-pill d-inline">Telat Datang</span>
                                    @else
                                        <span class="badge badge-success rounded-pill d-inline">Tepat Waktu</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($presensi->jamdatang >= '08:05:00')
                                        {{ $gajitelat }}
                                    @else
                                        {{ $gajitepat }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
