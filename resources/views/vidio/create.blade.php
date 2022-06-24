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
              <h6>Insert Video</h6>
            </div>
            <div class="p-4 bg-light">
                <form action="{{ route('vidio-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="gambar" class="form-control-label">Gambar</label>
                        <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" type="file" autofocus required>
                        @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-control-label">Judul</label>
                        <input class="form-control  @error('title') is-invalid @enderror" name="title" type="text" value="{{ old('title') }}" required>
                        @error('title')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="vidio" class="form-control-label">Video</label>
                      <input class="form-control  @error('video') is-invalid @enderror" name="video" id="video" type="file" >
                      @error('video')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="proofby" class="form-control-label">Proof By</label>
                      <input class="form-control  @error('proofby') is-invalid @enderror" name="proofby" type="text" value="{{ old('proofby') }}" required>
                      @error('proofby')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="penjelasan">Penjelasan</label>
                      <textarea id="penjelasan" name="penjelasan" value="{{ old('penjelasan') }}"></textarea>
                    </div>
                    <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('vidio-index') }}">Cancel</a>
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
</body>


</html>
