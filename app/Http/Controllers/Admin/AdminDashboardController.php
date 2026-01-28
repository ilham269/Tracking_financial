<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('Admin.dashboard', [
            'users' => $users,
            'totalUser' => $users->count(),
            'totalAdmin' => $users->where('role', 'admin')->count(),
            'totalUserBiasa' => $users->where('role', 'user')->count(),
        ]);
    }
}
