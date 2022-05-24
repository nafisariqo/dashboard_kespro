<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.head')
</head>
 
<body class="g-sidenav-show  bg-gray-100">
  @include('layout.sidebar')
  @include('layout.navbarq')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Insert Judul</h6>
            </div>
            <div class="p-4 bg-light">
                <form action="{{ route('judul-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul" class="form-control-label">Judul</label>
                        <input class="form-control" name="judul" type="text" value="{{ old('judul') }}" required autofocus>
                    </div> 
                    <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('quiz-index') }}">Cancel</a>
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
