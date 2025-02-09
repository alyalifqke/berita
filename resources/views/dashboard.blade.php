@extends('layouts.main')

@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Selamat Datang</h5>
            <p>{{ Auth::user()->name }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection