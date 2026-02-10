@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Foto Profil</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex align-items-center gap-3 mb-4">
                @if($user->profile_photo_path)
                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                         alt="Profile"
                         class="rounded-circle"
                         width="64" height="64">
                @else
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-dark text-white"
                         style="width:64px;height:64px;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <div class="fw-semibold">{{ $user->name }}</div>
                    <small class="text-muted">{{ $user->email }}</small>
                </div>
            </div>

            <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Upload Foto</label>
                    <input type="file" name="photo" class="form-control" accept="image/*" required>
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-dark">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
