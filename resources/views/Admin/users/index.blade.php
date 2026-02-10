@extends('layouts.Admin.app')

@section('title', 'Manajemen User')

@section('content')

<style>
    /* ================= DARK MODE BASE ================= */
    .dark-page {
        color: #e5e5e5;
    }

    /* ================= TITLE ================= */
    .dark-page h4 {
        color: #ffffff;
    }

    /* ================= ALERT ================= */
    .alert-success {
        background-color: #143d2b;
        border-color: #1f6f4a;
        color: #c9f5df;
    }

    .alert-danger {
        background-color: #3b1d1d;
        border-color: #6b2a2a;
        color: #ffd6d6;
    }

    /* ================= CARD ================= */
    .dark-card {
        background-color: #0f0f10;
        border: 1px solid #1f1f1f;
        border-radius: 14px;
    }

    /* ================= TABLE ================= */
    .table-dark-custom {
        color: #e5e5e5;
        margin-bottom: 0;
    }

    .table-dark-custom thead {
        background-color: #151515;
    }

    .table-dark-custom th {
        border-color: #2a2a2a;
        font-weight: 600;
        color: #ffffff;
        font-size: 0.9rem;
    }

    .table-dark-custom td {
        border-color: #2a2a2a;
        vertical-align: middle;
        font-size: 0.9rem;
    }

    .table-dark-custom tbody tr:hover {
        background-color: #1b1b1d;
    }

    /* ================= BADGE ================= */
    .badge-admin {
        background-color: #ffffff;
        color: #0f0f10;
    }

    .badge-user {
        background-color: #3a3a3a;
        color: #e5e5e5;
    }

    /* ================= BUTTON ================= */
    .btn-warning {
        background-color: #f0ad4e;
        border: none;
        color: #111;
    }

    .btn-warning:hover {
        background-color: #e19c3c;
        color: #111;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }
</style>

<div class="row dark-page">
    <div class="col-12">

        <h4 class="fw-bold mb-4">👥 Manajemen User</h4>

        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger rounded-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="card dark-card shadow-sm">
            <div class="card-body table-responsive p-0">
                <table class="table table-dark-custom align-middle">
                    <thead>
                        <tr>
                            <th class="px-3">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="px-3">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td class="text-muted">{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('admin.users.destroy', $user) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3"></i>
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
