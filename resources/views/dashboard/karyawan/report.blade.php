@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($report as $item)                    
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Slip Gaji Bulanan</h5>
                        <p class="card-text">{{ auth()->user()->name }}</p>
                        <p class="card-text">Total Gaji: {{ $item->gaji }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
