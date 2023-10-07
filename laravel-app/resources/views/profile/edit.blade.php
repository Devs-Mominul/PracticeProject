@extends('layouts.main')
@push('page_css')
@include('profile.partials.filepond-css')

@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="border-0 shadow card">
                <div class="card-header">
                    <h5 class="mb-0">Update Profile Info</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('patch')
            

                        <div class="mb-4 d-flex flex-column align-items-center">
                            <img width="120" class="img-thumbnail rounded-circle" src="{{ $user->getFirstMediaUrl() }}" alt="Profile Image">
                            <input type="file" name="image" id="image" data-max-file-size="500KB" class="mt-4 w-100">
                        </div>

                        <div class="mb-4">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" required value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="mb-4">
                            <label for="email">Email address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" required  value="{{ old('email', $user->email) }}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary d-flex align-items-center">
                                <span>Save Changes</span>
                                <i class="bi bi-check ms-1 fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="border-0 shadow card">
                <div class="card-header">
                    <h5 class="mb-0">Update Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label for="current_password">Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="current_password" class="form-control" id="current_password" required value="{{ old('current_password') }}">
                            @error('current_password', 'updatePassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password">New Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" required  value="">
                            @error('password', 'updatePassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required  value="">
                            @error('password_confirmation', 'updatePassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary d-flex align-items-center">
                                <span>Save Changes</span>
                                <i class="bi bi-check ms-1 fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page_js')
@include('profile.partials.filepond-js')

@endpush
