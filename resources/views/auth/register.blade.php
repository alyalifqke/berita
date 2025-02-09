@extends('layouts.main')

@section('content')

<nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Elements</li>
    </ol>
  </nav>

<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar User Baru</h5>
            
                    <form method="POST" action="{{ route('register') }}">
                        @csrf            
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input id="name" type="text" name="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name') }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" name="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email') }}" required autocomplete="username">
                         @error('email')
                             <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input id="password" type="password" name="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                required autocomplete="new-password">
                         @error('password')
                             <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                            </div>
                          </div>           

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Text</label>
                            <div class="col-sm-10">
                                <input id="password_confirmation" type="password" name="password_confirmation" 
                                class="form-control" required autocomplete="new-password">
                            </div>
                          </div>
                        <!-- Already Registered & Register Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none" href="#">
                               
                            </a>
            
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>





            </div>
        </div>
      </div>
    </div>
</section>



@endsection