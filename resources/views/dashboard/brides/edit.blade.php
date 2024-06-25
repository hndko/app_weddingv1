@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Pengantin Wanita') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Data Pengantin Wanita</h5>
                    <span><a href="{{ route('brides.index') }}" class="btn btn-primary btn-sm">Kembali</a></span>
                </div>
                <div class="card-body">
                    <form action="{{ route('brides.update', $bride->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="wedding_id">Wedding</label>
                            <select class="form-control" id="wedding_id" name="wedding_id" required>
                                @foreach ($weddings as $wedding)
                                    <option value="{{ $wedding->id }}"
                                        {{ $bride->wedding_id == $wedding->id ? 'selected' : '' }}>{{ $wedding->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Bride</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $bride->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $bride->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="current_image">Foto Bride</label>
                            <br>
                            <img src="{{ asset($bride->image) }}" alt="{{ $bride->name }}" class="img-fluid mb-2"
                                style="max-width: 300px;">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
