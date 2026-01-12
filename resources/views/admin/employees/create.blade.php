@extends('layouts.app')

@section('title', 'إضافة موظف جديد')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">إضافة موظف جديد</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('employees.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">الاسم الخاص بالموظف</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">كلمة المرور</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-5">حفظ</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">رجوع</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection