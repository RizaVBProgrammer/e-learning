@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $lesson->title }}</h1>

        <div class="mb-3">
            <iframe width="560" height="315" src="{{ $lesson->youtube_link }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
        </div>

        <p>{{ $lesson->description }}</p>

        <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Kembali</a>
        @if(Auth::check() && Auth::user()->is_admin)
            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelajaran ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        @endif
    </div>
@endsection
