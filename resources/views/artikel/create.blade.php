<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.head')
</head>
 
<body class="g-sidenav-show  bg-gray-100">
  @include('layout.sidebar')
  @include('layout.navbarar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Insert Article</h6>
            </div>
            <div class="p-4 bg-light">
                <form action="{{ route('artikel-store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="gambar" class="form-control-label">Gambar</label>
                        <img id="output" class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" type="file" id="gambar" onchange="previewImage(event)" required autofocus>
                        @error('gambar')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul" class="form-control-label">Judul</label>
                        <input class="form-control @error('judul') is-invalid @enderror" name="judul" type="text" value="{{ old('judul') }}">
                        @error('judul')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="proofby" class="form-control-label">Proof By</label>
                        <input class="form-control @error('proofby') is-invalid @enderror" name="proofby" type="text" value="{{ old('proofby') }}">
                        @error('proofby')
                          <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea id="summernote" name="isi" value="{{ old('isi') }}"></textarea>
                    </div>
                    <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('artikel-index') }}">Cancel</a>
                    <button type="submit" class="btn btn-secondary mt-4 mb-4">Create</button>
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
