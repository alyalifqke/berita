@extends('layouts.main')

@section('content')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="pagetitle">
    <h1>Tambah Kategori</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active">Kategori</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body" style="margin-bottom: 15%;">
            {{-- <h5 class="card-title">General Form Elements</h5> --}}

            <!-- General Form Elements -->
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
              <div class="row mb-3" style="margin-top: 5%;">
                <label for="title" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" id="name" required>
                  
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Simpan</button>
                <a class="btn btn-secondary" href="{{ route('categories.index') }}">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>










{{-- <form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Nama Kategori:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    
    <button type="submit">Simpan</button>
</form>

<a href="{{ route('categories.index') }}">Kembali</a> --}}
@endsection
