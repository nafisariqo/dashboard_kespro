<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.head')
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('layout.sidebar')
  @include('layout.navbarvi')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit Article</h6>
            </div>
            <div class="p-4 bg-gradient-secondary">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach ($post as $item) 
                    <div class="form-group"> 
                        <label for="gambar" class="form-control-label">Gambar</label>
                        <input type="hidden" name="gambar_lama" value="{{ $item->gambar }}">
                        <img src="{{ asset('gmbrArtikel/' . $item->gambar) }}" id="output" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" value="{{$item->gambar}}" onchange="previewImage(event)">
                        @error('gambar')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul" class="form-control-label">Judul</label>
                        <input class="form-control @error('judul') is-invalid @enderror" name="judul" type="text" value="{{ old('judul', $item->judul) }}">
                        @error('judul')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="proofby" class="form-control-label">Proof By</label>
                        <input class="form-control @error('proofby') is-invalid @enderror" name="proofby" type="text" value="{{ old('proofby', $item->proofby) }}">
                        @error('proofby')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea id="summernote" name="isi" value="{{ old('isi', $item->isi) }}"></textarea>
                    </div>
                      <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('artikel-index') }}">Cancel</a>
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
