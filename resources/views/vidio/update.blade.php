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
                <form action="" method="post">
                    {{-- @csrf --}}
                    <div class="form-group">
                      <label for="gambar" class="form-control-label">Gambar</label>
                      <input class="form-control" name="gambar" type="file" required>
                  </div>
                  <div class="form-group">
                      <label for="judul" class="form-control-label">Judul</label>
                      <input class="form-control" name="judul" type="text" required>
                  </div>
                  <div class="form-group">
                    <label for="vidio" class="form-control-label">Video</label>
                    <input class="form-control" name="vidio" type="file" required>
                  </div>
                  <div class="form-group">
                      <label for="penjelasan">Penjelasan</label>
                      <textarea class="form-control" id="penjelasan" name="penjelasan" rows="10" required></textarea>
                  </div>
                      <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('vidio-index') }}">Cancel</a>
                      <button class="btn bg-gradient-secondary mt-4 mb-4" type="submit">Save Changes</button>
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
