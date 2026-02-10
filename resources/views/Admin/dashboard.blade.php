@extends('layouts.Admin.app')

@section('title', 'Admin Dashboard')

@section('content')

<style>
    /* ===== ADMIN DASHBOARD MONOCHROME ===== */

    h4, h6 {
        color: #111827;
        font-weight: 600;
    }

    p.text-muted {
        color: #6b7280 !important;
    }

    /* ===== CARD ===== */
    .card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0,0,0,.08);
    }

    .card-header {
        background-color: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        font-weight: 600;
        color: #111827;
    }

    .card-body h6 {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 6px;
    }

    .card-body h3 {
        color: #111827 !important;
    }

    /* ===== TABLE ===== */
    .table {
        border-color: #e5e7eb;
    }

    .table thead th {
        background-color: #f9fafb;
        color: #374151;
        font-weight: 600;
        border-bottom: 2px solid #e5e7eb;
    }

    .table tbody td {
        color: #111827;
        vertical-align: middle;
    }

    /* ===== BADGE (MONOCHROME) ===== */
    .badge.bg-primary {
        background-color: #111827 !important;
    }

    .badge.bg-secondary {
        background-color: #6b7280 !important;
    }

    /* ===== EMPTY STATE ===== */
    .text-muted {
        color: #6b7280 !important;
    }
</style>

<div class="row">

    {{-- HEADER --}}
    <div class="col-12 mb-4">
        <h4 class="fw-bold">👑 Admin Panel</h4>
        <p class="text-muted">
            Selamat datang, {{ auth()->user()->name }} 👋
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total User</h6>
                <h3 class="fw-bold">{{ $totalUserBiasa }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>User</h6>
                <h3 class="fw-bold">{{ $totalUserBiasa }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Admin</h6>
                <h3 class="fw-bold">{{ $totalAdmin }}</h3>
            </div>
        </div>
    </div>

    {{-- TABLE USER --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Data User</h6>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role === 'admin')
                                        <span class="badge bg-primary">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Data user belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
