@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Wedding') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Data Wedding</h5>
                    <span><a href="{{ route('weddings.index') }}" class="btn btn-primary btn-sm">Kembali</a></span>
                </div>
                <div class="card-body">
                    <form action="{{ route('weddings.update', $wedding->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $wedding->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="groom_name">Groom's Name</label>
                            <input type="text" class="form-control" id="groom_name" name="groom_name"
                                value="{{ $wedding->groom_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="bride_name">Bride's Name</label>
                            <input type="text" class="form-control" id="bride_name" name="bride_name"
                                value="{{ $wedding->bride_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="wedding_date">Wedding Date</label>
                            <input type="date" class="form-control" id="wedding_date" name="wedding_date"
                                value="{{ $wedding->wedding_date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="invitation_message">Invitation Message</label>
                            <textarea class="form-control" id="invitation_message" name="invitation_message" rows="3">{{ $wedding->invitation_message }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="quran_verse">Quran Verse</label>
                            <textarea class="form-control" id="quran_verse" name="quran_verse" rows="3">{{ $wedding->quran_verse }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
