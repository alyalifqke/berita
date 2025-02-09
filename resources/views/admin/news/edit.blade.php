@extends('layouts.main')

@section('content')
<h2>Edit Berita</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- <form action="{{ route('news.update', $news->slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="title">Judul:</label>
    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required>

    <label for="category_id">Kategori:</label>
    <select name="category_id" id="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <label for="content">Konten:</label>
    <textarea name="content" id="editor" required>{{ old('content', $news->content) }}</textarea>
    {{-- <textarea name="content" id="editor" required>{{ old('content') }}</textarea> --}}

    {{-- <label for="image">Gambar:</label>
    <input type="file" name="image" id="image">

    @if ($news->image)
        <p>Gambar Saat Ini:</p>
        <img src="{{ asset('storage/' . $news->image) }}" width="150">
    @endif

    <button type="submit">Update</button>
</form>

<a href="{{ route('news.index') }}">Kembali</a> --}}



<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="{{ route('news.update', $news->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Judul Berita</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $news->title) }}" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="category_id">Kategori</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                        @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">File Upload</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" name="image" id="image">
                    @if ($news->image)
                    <p>Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $news->image) }}" width="300">
                    @endif
                </div>
              </div>
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Konten</label>
                <div class="col-sm-10">
                  {{-- <div style="height: 300px;" class="quill-editor-full">
                    {{ old('content', $news->content) }}
                  </div> --}}
                  {{-- <div class="quill-editor-default">
                    <P> 
                      
                      {!! old('content', $news->content) !!}
                      </P>
                     
                    </div>  --}}
                   
                    <!-- Quill Editor -->
                    <div id="editor-container" style="height: 300px;">{!! old('content', $news->content ?? '') !!}</div>
                    <input type="hidden" name="content" id="content" value="{{ old('content', $news->content) }}" required>

                    {{-- <textarea type="hidden" name="content" id="editor">{{ old('content', $news->content ?? '') }}</textarea> --}}
                </div>
              </div>
              <br>
              <div class="row mb-3" style="margin-top: 30px;">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a class="btn btn-secondary" href="{{ route('news.index') }}">Batal</a>
                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>

      </div>
      </div>
    </div>

  </section>
<!-- Quill Styles & Scripts -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });

        // Set initial content jika ada data lama
        quill.root.innerHTML = {!! json_encode(old('content', $news->content ?? '')) !!};

        // Saat form dikirim, simpan isi Quill ke dalam input hidden
        document.querySelector('form').onsubmit = function (event) {
            let content = quill.root.innerHTML.trim(); // Ambil isi editor
            document.querySelector("#content").value = content;

            // Validasi manual jika content kosong
            if (content.replace(/<(.|\n)*?>/g, '').trim().length === 0) {
                alert("Content is required!");
                event.preventDefault(); // Batalkan submit jika kosong
                return false;
            }
        };
    });
</script>


{{-- <script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': '1'}, { 'header': '2'}, { 'font': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['bold', 'italic', 'underline'],
                ['link', 'image'],
                [{ 'color': [] }, { 'background': [] }],
                ['clean']
            ]
        }
    });

    // Mengambil data dari editor dan menyimpannya di field hidden
    $('form').on('submit', function() {
        var content = quill.root.innerHTML;
        $('#content').val(content);
    });

    // Set content ke editor saat halaman dimuat
    var content = $('#content').val();
    quill.root.innerHTML = content;
</script> --}}
@endsection
