@extends('layouts.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Setting</h5>

            <!-- General Form Elements -->
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Website</label>
                <div class="col-sm-10">
                  <input type="text" type="text" name="site_name" class="form-control" value="{{ $setting->site_name ?? '' }}" required>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Logo</label>
                <div class="col-sm-10">
                    @if($setting->logo)
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $setting->logo) }}" width="100" style="margin-right: 20px; margin-bottom: 20px;">
                        {{-- <button type="submit" formaction="{{ route('admin.settings.deleteImage', 'logo') }}" 
                        formmethod="DELETE" class="btn btn-danger btn-sm ml-3">
                        Hapus
                        </button> --}}
{{--                         
                        <form action="{{ route('admin.settings.deleteImage', 'logo') }}" method="POST" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form> --}}
                    </div>
                    @endif
                    <input type="file" name="logo" class="form-control" id="formFile">
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Iklan 1</label>
                <div class="col-sm-10">
                    @if($setting->ad_image_1)
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $setting->ad_image_1) }}" width="500" style="margin-right: 20px; margin-bottom: 20px;">
                        {{-- <button type="submit" formaction="{{ route('admin.settings.deleteImage', 'ad_image_1') }}" 
                        formmethod="DELETE" class="btn btn-danger btn-sm ml-3">
                        Hapus
                        </button> --}}
                        
                        {{-- <form action="{{ route('admin.settings.deleteImage', 'ad_image_1') }}" method="POST" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form> --}}
                    </div>
                    @endif
                    <input type="file" name="ad_image_1" class="form-control" id="formFile">
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Iklan 2</label>
                <div class="col-sm-10">
                    @if($setting->ad_image_2)
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $setting->ad_image_2) }}" width="100" style="margin-right: 20px; margin-bottom: 20px;">
                        {{-- <button type="submit" formaction="{{ route('admin.settings.deleteImage', 'ad_image_1') }}" 
                        formmethod="DELETE" class="btn btn-danger btn-sm ml-3">
                        Hapus
                        </button> --}}
                        {{-- <form action="{{ route('admin.settings.deleteImage', 'ad_image_2') }}" method="POST" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form> --}}
                    </div>
                    @endif
                    <input type="file" name="ad_image_2" class="form-control" id="formFile">
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Modal</label>
                <div class="col-sm-10">
                    <select name="modal_active" class="form-control" aria-label="Default select example">
                        <option value="1" {{ $setting->modal_active ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !$setting->modal_active ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Isi Modal</label>
                <div class="col-sm-10">
                    <textarea name="modal_content" class="form-control">{{ $setting->modal_content ?? '' }}</textarea>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Info di Footer</label>
                <div class="col-sm-10">
                    <input type="text" name="footer_info" class="form-control" value="{{ $setting->footer_info ?? '' }}">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" value="{{ $setting->phone ?? '' }}">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" value="{{ $setting->address ?? '' }}">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="ads" class="form-control" value="{{ $setting->ads ?? '' }}">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
