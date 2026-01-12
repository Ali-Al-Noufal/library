<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="font-weight-light mb-0">تسجيل الدخول</h3>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- البريد الإلكتروني -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">البريد الإلكتروني</label>
                            <input id="email" type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email" 
                                   autofocus 
                                   placeholder="example@gmail.com">
                            
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- كلمة المرور -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">كلمة المرور</label>
                            <input id="password" type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="••••••••">
                            
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- زر تسجيل الدخول -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                تسجيل الدخول
                            </button>
                        </div>
                                                <div class="d-grid py-3">
                            <button  class="btn btn-secondary btn-lg ">
                             <a href={{ route('welcome') }} class="text-white text-decoration-none">رجوع</a>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection