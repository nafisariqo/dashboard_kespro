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
              <h6>Insert Information for Webinar</h6>
            </div>
            <div class="p-4 bg-light">
                <form action="{{ route('webinar-store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="example-search-input" class="form-control-label">Judul</label>
                      <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" value="{{ old('judul') }}" required autofocus>
                      @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="gambar" class="form-label">Gambar</label>
                      {{-- <input type="hidden" name="gambar" value="{{ old('gambar') }}"> --}}
                      <img id="output" class="img-preview img-fluid mb-3 col-sm-5">
                      <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage(event)">
                      @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="px-4">
                        <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('webinar-index') }}">Cancel</a>
                        <button type="submit" class="btn btn-secondary mt-4 mb-4">Create</button>
                    </div>
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
  
  @push('addon-script')
    <script>
        $(document).ready(function() {
            setTimeout (function () {
                $('.alert').hide();
            }, 2000);
            $('#example').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<",
                        "next": ">"
                    }
                }
            });
        });
    </script>
@endpush

</body>
</html>
