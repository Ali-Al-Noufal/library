@extends('layouts.app')

@section('title', 'لوحة التحكم الرئيسية')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1 class="h3">لوحة التحكم</h1>
        <p class="text-muted">نظرة عامة على حضور جميع الموظفين</p>
    </div>
    <div class="col-auto">
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> إضافة موظف جديد
        </a>
    </div>
</div>

@forelse($employees as $employee)
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">{{ $employee->name }}</h5>
                <small class="text-muted">{{ $employee->email }}</small>
            </div>
            <div>
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-outline-warning">تعديل</a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('متأكد من الحذف؟')">
                        حذف
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body">
            @if($employee->attendances->isEmpty())
                <p class="text-center text-muted py-4">لا توجد سجلات حضور بعد</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>التاريخ</th>
                                <th>وقت الدخول</th>
                                <th>وقت الخروج</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee->attendances->take(10) as $att)
                                <tr>
                                    <td>{{ $att->date->format('Y/m/d') }}</td>
                                    <td>{{ $att->check_in ? $att->check_in->format('H:i:s') : '-' }}</td>
                                    <td>{{ $att->check_out ? $att->check_out->format('H:i:s') : '-' }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <small class="text-muted">يظهر آخر 10 تسجيلات فقط</small>
            @endif
        </div>
    </div>
@empty
    <div class="alert alert-info text-center">
        لا يوجد موظفين مسجلين بعد. <a href="{{ route('employees.create') }}">أضف موظفاً جديداً</a>
    </div>
@endforelse
@endsection