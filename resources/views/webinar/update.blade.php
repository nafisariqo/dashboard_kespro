<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.head')
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('layout.sidebar')
  @include('layout.navbarnar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit Webinar</h6>
            </div>
            <div class="p-4 bg-gradient-secondary">
                <form action="{{ route('webinar.edit', $web[0]->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    @foreach ($web as $item) 
                      <div class="form-group">
                        <label for="judul" class="form-control-label">Judul</label>
                        <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" value="{{ old('judul', $item->judul) }}">
                        @error('judul')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="hidden" name="gambar_lama" value="{{ $item->gambar }}">
                        <img src="{{ asset('gmbrWebinar/' . $item->gambar) }}" id="output" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" value="{{$item->gambar}}" onchange="previewImage(event)">
                        @error('gambar')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('webinar-index') }}">Cancel</a>
                      <button class="btn bg-gradient-secondary mt-4 mb-4" type="submit">Save Changes</button>
                    @endforeach
                </form>
            </div>
          </div>
        </div>
      </div>
      @include('layout.footer')
    </div>
  </main>
  @include('layout.sidenav')
  @include('layout.script')
</body>


</html>
