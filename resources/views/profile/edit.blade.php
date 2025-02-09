@extends('layouts.main')

@section('content')

<div class="pagetitle">
    <h1>Form Elements</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Update</li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ubah Profil</h5>
            <p></p>
            <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                @csrf
            </form>
        
            <form method="POST" action="{{ route('profile.update') }}" class="mt-3">
                @csrf
                @method('PATCH')
        
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    </div>
                </div>
        
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email', $user->email) }}" required autocomplete="email">
                    </div>
                </div>
        
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning mt-2">
                        <p class="mb-2">
                            {{ __('Your email address is unverified.') }}
                        </p>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </form>
        
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif        
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ubah Password</h5>
            <form method="POST" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('PUT')
            
                <!-- Current Password -->
                <div class="row mb-3">
                    <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                        <input id="current_password" name="current_password" type="password" 
                               class="form-control @error('current_password') is-invalid @enderror" 
                               autocomplete="current-password" required>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <!-- New Password -->
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input id="password" name="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               autocomplete="new-password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <!-- Confirm Password -->
                <div class="row mb-3">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input id="password_confirmation" name="password_confirmation" type="password" 
                               class="form-control" autocomplete="new-password" required>
                    </div>
                </div>
            
                <!-- Save Button -->
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan Password</button>
            
                        <!-- Success Message -->
                        @if (session('status') === 'password-updated')
                            <p class="text-success mt-2">Password updated successfully!</p>
                        @endif
                    </div>
                </div>
            </form>
            
          </div>
        </div>

      </div>
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Hapus Akun</h5>
                                
                <button type="button" class="btn btn-danger" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                {{ __('Delete Account') }}
                </button>

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('DELETE')

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-4">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" name="password" type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="{{ __('Enter your password') }}" required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </button>

                        <button type="submit" class="btn btn-danger ms-3">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
                </x-modal>

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection