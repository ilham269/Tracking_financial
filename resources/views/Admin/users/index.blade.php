@extends('layouts.Admin.app')

@section('title', 'Manajemen User')

@section('content')
<div class="row">
    <div class="col-12">

        <h4 class="fw-bold mb-3">👥 Manajemen User</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">
                                   <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('admin.users.destroy', $user) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                       <i class="bi bi-trash3"></i> Hapus
                                    </button>
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
