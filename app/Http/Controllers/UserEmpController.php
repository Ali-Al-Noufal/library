<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserEmpController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 'employee')->get();
        return view('admin.dashboard', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255|unique:users,name',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'password' => Hash::make($request->password),
            'role'     => 'employee',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'تم إضافة الموظف بنجاح');
    }
    public function edit(User $employee)
    {
        // تأكد أنه موظف وليس أدمن
        if ($employee->role !== 'employee') {
            abort(403);
        }

        return view('admin.employees.edit', compact('employee'));
    }

    // تحديث بيانات الموظف
    public function update(Request $request, User $employee)
    {
        if ($employee->role !== 'employee') {
            abort(403);
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $employee->update([
            'name'  => $request->name,
            
            'password' => Hash::make($request->password) 
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'تم تعديل بيانات الموظف بنجاح');
    }

    // حذف الموظف
    public function destroy(User $employee)
    {
        if ($employee->role !== 'employee') {
            abort(403);
        }

        $employee->delete();

        return redirect()->route('dashboard')
            ->with('success', 'تم حذف الموظف نهائياً بنجاح');
    }
}
