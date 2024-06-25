@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Rekening Pernikahan Baru') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5>Tambah Data Rekening Pernikahan</h5>
                    <span><a href="{{ route('gifts.index') }}" class="btn btn-primary btn-sm">Kembali</a></span>
                </div>
                <div class="card-body">
                    <form action="{{ route('gifts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="wedding_id">Wedding</label>
                            <select class="form-control" id="wedding_id" name="wedding_id" required>
                                @foreach ($weddings as $wedding)
                                    <option value="{{ $wedding->id }}">{{ $wedding->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Nama Bank</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Nomor Rekening</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" required>
                        </div>
                        <div class="form-group">
                            <label for="account_name">Nama Akun</label>
                            <input type="text" class="form-control" id="account_name" name="account_name" required>
                        </div>
                        <div class="form-group">
                            <label for="qr_code_image">QR Code Gambar</label>
                            <input type="file" class="form-control-file" id="qr_code_image" name="qr_code_image"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
