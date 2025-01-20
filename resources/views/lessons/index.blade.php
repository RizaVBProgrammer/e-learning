@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pelajaran</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(Auth::check() && Auth::user()->is_admin)
            <a href="{{ route('lessons.create') }}" class="btn btn-primary mb-3">Tambah Pelajaran</a>
        @endif

        @if($lessons->isEmpty())
            <p>Tidak ada pelajaran yang tersedia.</p>
        @else
            <div class="row">
                @foreach($lessons as $lesson)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lesson->title }}</h5>
                                <p class="card-text">{{ Str::limit($lesson->description, 100) }}</p>
                                <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-info">Lihat</a>
                                @if(Auth::check() && Auth::user()->is_admin)
                                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelajaran ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
