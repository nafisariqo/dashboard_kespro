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
                <form action="{{ route('vidio.edit', $vidio[0]->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach ($vidio as $item) 
                    <div class="mb-3">
                      <label for="gambar" class="form-label">Gambar</label>
                      <input type="hidden" name="gambar_lama" value="{{ $item->gambar }}">
                      <img src="{{ url($item->gambar) }}" id="output" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" value="{{$item->gambar}}" onchange="previewImage(event)">
                      @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-control-label">Judul</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" type="text" value="{{ old('title', $item->title) }}" required>
                        @error('title')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="vidio" class="form-control-label">Video</label>
                        <video width="320" controls>
                            <source src="{{ url($item->video) }}" type="video/mp4">
                            Your browser does not support the video tag.                        
                        </video>
                        <input class="form-control @error('vidio') is-invalid @enderror" name="vidio" type="file" value="{{ $item->video}}" required>
                        @error('vidio')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="proofby" class="form-control-label">Proof By</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="proofby" type="text" value="{{ old('proofby', $item->proofby) }}" required>
                        @error('proofby')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penjelasan">Penjelasan</label>
                        <textarea class="form-control" id="penjelasan" name="penjelasan" required>{{$item->penjelasan}}</textarea>
                    </div>
                      <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('vidio-index') }}">Cancel</a>
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
