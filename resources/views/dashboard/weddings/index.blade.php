@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Weddings') }}</h1>

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

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Weddings</h5>
                    <span><a href="{{ route('weddings.create') }}" class="btn btn-primary btn-sm">Tambah Data</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Groom Name</th>
                                    <th>Bride Name</th>
                                    <th>Wedding Date</th>
                                    <th>Invitation Message</th>
                                    <th>Quran Verse</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($weddings as $wedding)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $wedding->title }}</td>
                                        <td>{{ $wedding->groom_name }}</td>
                                        <td>{{ $wedding->bride_name }}</td>
                                        <td>{{ $wedding->wedding_date }}</td>
                                        <td>{{ $wedding->invitation_message }}</td>
                                        <td>{{ $wedding->quran_verse ?: '-' }}</td>
                                        <td>
                                            <a href="{{ route('weddings.edit', $wedding->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('weddings.destroy', $wedding->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this wedding?')">Delete</button>
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
