@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Events') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Events</h5>
                    <span><a href="{{ route('events.create') }}" class="btn btn-primary btn-sm">Tambah Data</a></span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Acara</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Tanggal</th>
                                <th>Nama Tempat</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($data['events'] as $event)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->start_time }}</td>
                                    <td>{{ $event->end_time === null ? '-' : $event->end_time }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->location_name }}</td>
                                    <td>{{ $event->address }}</td>
                                    <td>
                                        <!-- Tambahkan tombol edit dan delete sesuai kebutuhan -->
                                        <a href="{{ route('events.edit', $event->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
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
@endsection
