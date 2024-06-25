@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Rekening Pernikahan') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Data Rekening Pernikahan</h5>
                    <span><a href="{{ route('gifts.index') }}" class="btn btn-primary btn-sm">Kembali</a></span>
                </div>
                <div class="card-body">
                    <form action="{{ route('gifts.update', $gift->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="wedding_id">Wedding</label>
                            <select class="form-control" id="wedding_id" name="wedding_id" required>
                                @foreach ($weddings as $wedding)
                                    <option value="{{ $wedding->id }}"
                                        {{ $gift->wedding_id == $wedding->id ? 'selected' : '' }}>{{ $wedding->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Nama Bank</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name"
                                value="{{ $gift->bank_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Nomor Rekening</label>
                            <input type="text" class="form-control" id="account_number" name="account_number"
                                value="{{ $gift->account_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="account_name">Nama Akun</label>
                            <input type="text" class="form-control" id="account_name" name="account_name"
                                value="{{ $gift->account_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="current_qr_code">QR Code Gambar</label>
                            <br>
                            <img src="{{ asset($gift->qr_code_image) }}" alt="QR Code Image" class="img-fluid mb-2"
                                style="max-width: 300px;">
                            <input type="file" class="form-control-file" id="qr_code_image" name="qr_code_image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
