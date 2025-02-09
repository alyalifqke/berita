@extends('layouts.main')

@section('content')
{{-- <a href="{{ route('categories.create') }}">Tambah Kategori</a> --}}

{{-- @if(session('success'))
    <p>{{ session('success') }}</p>
@endif --}}

<div class="pagetitle">
    <h1>Kategori</h1>
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
          <div class="card-body">
            <!-- Table with hoverable rows -->
            <a class="btn btn-primary" href="{{ route('categories.create') }}" style="margin-bottom: 10px; margin-top:10pt; float: right;"><i class="bi bi-plus-lg"></i> Tambah Kategori</a>
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th style="width: 70%;">Nama</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                         <a class="btn btn-warning btn-sm" href="{{ route('categories.edit', $category->id) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                        </form>   
                        </div>
                        
                        
                    </td>
                </tr>
              </tbody>
              @endforeach
            </table>
            <!-- End Table with hoverable rows -->
          </div>
        </div>
 
      </div>
    </div>
  </section>



  <script>
    function confirmDelete() {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("delete-form").submit();
            }
        });
    }
</script>

{{-- <table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table> --}}
@endsection
