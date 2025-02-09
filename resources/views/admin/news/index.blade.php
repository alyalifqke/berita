@extends('layouts.main')

@section('content')

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <a class="btn btn-primary" href="{{ route('news.create') }}" style="margin-bottom: 10px; margin-top:10pt; float: right;"><i class="bi bi-plus-lg"></i> Tambah Berita</a>
            <h5 class="card-title">Berita</h5>

            <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>G</b>ambar
                    </th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    {{-- <th>Isi Konten</th> --}}
                    <th data-type="date" data-format="YYYY/DD/MM">Dibuat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($news as $item)
                    <td>
                      @if ($item->image)
                      <img src="{{ asset('storage/'.$item->image) }}" width="100" height="60" />
                      @else
                          <img src="{{ asset('storage/assets/img/no_image.jpg') }}" width="100" height="60">
                      @endif
                        
                        {{-- <img src="public/. {{ $item->image }}" alt=""> --}}
                        </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>
                    {{-- <td>{{ $item->content }}</td> --}}
                    <td>{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y') }}</td>
                    <td>
                          <div style="display: flex; gap: 5px;">
                            <a href="{{ route('news.edit', $item->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('news.destroy', $item->slug) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                         </div>
                         </form>
                    </td>
                  </tr> 
                  @endforeach
                </tbody> 
                {{-- <div>
                {{ $news->links() }}
            </div> --}}
            </table>
           
            
            </div>
        </div>
      </div>
    </div>



            {{-- <table class="table table-bordered table-hover" id="news-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Konten</th>
                        <th>Created At</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>

          </div>
        </div>

      </div>

    </div>
     <!-- DataTables Scripts -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

     <script>
     $(document).ready(function() {
         $('#news-table').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('news.index') }}",
             columns: [
                 { data: null, searchable: false, orderable: false, render: function (data, type, row, meta) {
                     return meta.row + 1;
                 }},
                 { data: 'image', name: 'image', orderable: false, searchable: false },
                 { data: 'title', name: 'title' },
                 { data: 'category.name', name: 'category.name' },
                 // { data: 'content', name: 'content' },
                 { data: 'content', name: 'content', render: function(data, type, row) {
                 return data.replace(/<\/?p>/g, ""); 
                 }},
                 { data: 'created_at', name: 'created_at' },
                 { data: 'updated_at', name: 'updated_at' },
                 { data: 'action', name: 'action', orderable: false, searchable: false }
             ]
         });
     });
     </script> --}}
  </section>
       
@endsection
