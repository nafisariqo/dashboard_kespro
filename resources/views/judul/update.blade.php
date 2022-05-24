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
              <h6>Edit Judul</h6>
            </div>
            <div class="p-4 bg-gradient-secondary">
                <form action="{{ route('judul.edit', $jdl[0]->id) }}" method="post">
                    @csrf
                    @foreach ($jdl as $row) 
                      <div class="form-group">
                          <label for="judul" class="form-control-label">Judul</label>
                          <input class="form-control" type="text" name="judul" value="{{ $row->judul }}" required autofocus>
                      </div>
                      <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('quiz-index') }}">Cancel</a>
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
