@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Cerita Pernikahan') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Data Cerita Pernikahan</h5>
                    <span><a href="{{ route('stories.index') }}" class="btn btn-primary btn-sm">Kembali</a></span>
                </div>
                <div class="card-body">
                    <form action="{{ route('stories.update', $story->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="wedding_id">Wedding</label>
                            <select class="form-control" id="wedding_id" name="wedding_id" required>
                                @foreach ($weddings as $wedding)
                                    <option value="{{ $wedding->id }}"
                                        {{ $story->wedding_id == $wedding->id ? 'selected' : '' }}>{{ $wedding->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Judul Cerita</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $story->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ $story->date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $story->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="current_image">Gambar Cerita</label>
                            <br>
                            <img src="{{ asset($story->image) }}" alt="{{ $story->title }}" class="img-fluid mb-2"
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
