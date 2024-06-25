@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Event Baru') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5>Tambah Data Events</h5>
                    <span><a href="{{ route('events.index') }}" class="btn btn-primary btn-sm">Kembali</a></span>
                </div>
                <div class="card-body">
                    <form action="{{ route('events.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Acara</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Waktu Mulai</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required>
                        </div>
                        <div class="form-group">
                            <label for="end_time">Waktu Selesai</label>
                            <input type="time" class="form-control" id="end_time" name="end_time">
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal Acara</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="location_name">Nama Tempat Acara</label>
                            <input type="text" class="form-control" id="location_name" name="location_name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat Acara</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
