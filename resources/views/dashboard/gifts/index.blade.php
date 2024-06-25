@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Rekening Pernikahan') }}</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Rekening Pernikahan</h5>
                    <span><a href="{{ route('gifts.create') }}" class="btn btn-primary btn-sm">Tambah Data</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Wedding</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nama Akun</th>
                                    <th>QR Code</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gifts as $gift)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gift->wedding->title }}</td>
                                        <td>{{ $gift->bank_name }}</td>
                                        <td>{{ $gift->account_number }}</td>
                                        <td>{{ $gift->account_name }}</td>
                                        <td><img src="{{ asset($gift->qr_code_image) }}" alt="QR Code"
                                                style="max-width: 100px;"></td>
                                        <td>
                                            <a href="{{ route('gifts.edit', $gift->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
