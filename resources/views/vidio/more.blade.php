<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout/head')
</head>

<body class="g-sidenav-show bg-gray-100">
  @include('layout/sidebar')
  @include('layout/navbarvi')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Penjelasan</h6>
                  </div>
                </div>
              </div>
              <div class="card-body p-3">
                <p class="text-sm">{!! $post->penjelasan !!}</p>
                <hr class="horizontal gray-light my-4">
                <a class="btn bg-gradient-warning mt-4 mb-4" href="{{ route('vidio-index') }}">Cancel</a>
              </div>
            </div>
        </div>
        </div>
      </div>
    @include('layout/footer')
    </div>
    @include('layout/sidenav')
    @include('layout/script')
</body>

</html>