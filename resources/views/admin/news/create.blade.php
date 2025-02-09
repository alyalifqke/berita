@extends('layouts.main')

@section('content')
<h2>Tambah Berita</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Judul:</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}" required>

    <label for="category_id">Kategori:</label>
    <select name="category_id" id="category_id" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select> --}}

    {{-- <label for="content">Konten:</label> --}}
    {{-- <textarea name="content" id="content" required>{{ old('content') }}</textarea> --}}
    {{-- <textarea name="content" id="editor" required>{{ old('content') }}</textarea> --}}

    {{-- <label for="image">Gambar:</label>
    <input type="file" name="image" id="image">

    <button type="submit">Simpan</button>
</form> --}}

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Judul Berita</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="category_id">Kategori</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" required>
                    <option value="">----Pilih Kategori----</option>
                        @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">File Upload</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" name="image" id="image">
                </div>
              </div>
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Konten</label>
                <div class="col-sm-10">
                    {{-- <textarea name="content" id="editor">{{ old('content', $news->content ?? '') }}</textarea> --}}
                    <div id="editor" style="height: 300px;">{!! old('content', $news->content ?? '') !!}</div>
                    <input type="hidden" name="content" id="content">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10" style="margin-top: 50px"> 
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a class="btn btn-secondary" href="{{ route('news.index') }}">Kembali</a>
                </div>
              </div>
            </form><!-- End General Form Elements -->
            
          </div>
        </div>

      </div>
      </div>
    </div>
  </section>
<!-- Tambahkan Quill CSS dan JS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      var quill = new Quill('#editor', {
          theme: 'snow'
      });

      // Set initial content jika ada data lama
      quill.root.innerHTML = {!! json_encode(old('content', $news->content ?? '')) !!};

      // Saat form dikirim, simpan isi Quill ke dalam input hidden
      document.querySelector('form').onsubmit = function () {
          document.querySelector("#content").value = quill.root.innerHTML;
      };
  });
</script>

@endsection
