@extends('layouts.main')
@section('content')
    @if (!$dataPresensi->isEmpty())
        <div class="container mt-5">
            <div class="row">
                <div class="d-flex justify-content-end">
                    @if (!$dataTerakhir->jampulang)
                        <form action="/presensiPulang" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $dataTerakhir->id }}">
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="user_nip" value="{{ auth()->user()->nip }}">
                            <input type="submit" class="btn btn-danger" value="Presensi Pulang">
                        </form>
                    @else
                        <form action="/presensi" method="post">
                            @csrf
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="user_nip" value="{{ auth()->user()->nip }}">
                            <input type="submit" class="btn btn-success" value="Presensi Datang">
                        </form>
                    @endif

                </div>
                <div class="col-sm-12">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center">Name</th>
                                <th>Datang</th>
                                <th>Pulang</th>
                                <th>Status Datang</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataPresensi as $presensi)
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
                                        <p class="fw-normal mb-1">{{ $presensi->tanggaldatang }} {{ $presensi->jamdatang }}
                                        </p>
                                    </td>
                                    <td>{{ $presensi->jampulang }}</td>
                                    <td>
                                        @if ($presensi->jamdatang >= '08:05:00')
                                            <span class="badge badge-danger rounded-pill d-inline">Telat Datang</span>
                                        @else
                                            <span class="badge badge-success rounded-pill d-inline">Tepat Waktu</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="row">
                <div class="d-flex justify-content-end">
                    <form action="/presensi" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="user_nip" value="{{ auth()->user()->nip }}">
                        <input type="submit" class="btn btn-success" value="Presensi Datang">
                    </form>
                </div>
                <div class="col-sm-12">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center">Name</th>
                                <th>Datang</th>
                                <th>Pulang</th>
                                <th>Status Datang</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataPresensi as $presensi)
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
                                        <p class="fw-normal mb-1">{{ $presensi->tanggaldatang }}
                                            {{ $presensi->jamdatang }}
                                        </p>
                                    </td>
                                    <td>{{ $presensi->jampulang }}</td>
                                    <td>
                                        @if ($presensi->jamdatang >= '08:05:00')
                                            <span class="badge badge-danger rounded-pill d-inline">Telat Datang</span>
                                        @else
                                            <span class="badge badge-success rounded-pill d-inline">Tepat Waktu</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif




@endsection
