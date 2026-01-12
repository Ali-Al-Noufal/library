@extends('layouts.app')

@section('title', 'تعديل موظف')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-light">
                <h5 class="mb-0">تعديل بيانات الموظف: {{ $employee->name }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('employees.update', $employee) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">الاسم الكامل</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $employee->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">كلمة مرور جديدة </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">تأكيد كلمة المرور الجديدة</label>
                        <input type="password" name="password_confirmation" class="form-control" required >
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary text-light px-5">حفظ التعديلات</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">رجوع</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection