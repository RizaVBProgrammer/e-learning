@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Pelajaran</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong> Silakan periksa input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Pelajaran</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $lesson->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="youtube_link" class="form-label">Link YouTube</label>
                <input type="url" name="youtube_link" class="form-control" id="youtube_link" value="{{ old('youtube_link', $lesson->youtube_link) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi (Opsional)</label>
                <textarea name="description" class="form-control" id="description" rows="4">{{ old('description', $lesson->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
