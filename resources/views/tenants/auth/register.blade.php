@extends('layouts.tenant')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tenant.register.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('content')
<div class="container">
    <h2>Register a New Tenant</h2>

    <form action="{{ route('tenants.register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tenant_name">Tenant Name:</label>
            <input type="text" name="tenant_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="slug">Tenant Slug (path):</label>
            <input type="text" name="slug" class="form-control" required>
        </div>

        <h4>Admin Information</h4>

        <div class="form-group">
            <label for="admin_name">Admin Name:</label>
            <input type="text" name="admin_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="admin_email">Admin Email:</label>
            <input type="email" name="admin_email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="admin_password">Admin Password:</label>
            <input type="password" name="admin_password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="admin_password_confirmation">Confirm Password:</label>
            <input type="password" name="admin_password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Register Tenant</button>
        </div>
    </form>
</div>
@endsection --}}
