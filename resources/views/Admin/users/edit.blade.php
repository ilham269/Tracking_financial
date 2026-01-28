@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <h4 class="fw-bold mb-3">✏️ Edit User</h4>

        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select">
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                                User
                            </option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
