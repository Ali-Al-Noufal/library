<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 'employee')
            ->with(['attendances' => function ($query) {
                $query->orderBy('date', 'desc');
            }])
            ->get();

        return view('admin.dashboard', compact('employees'));
    }
}
