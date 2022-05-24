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
              <h6>Insert Quiz</h6>
            </div>
            <div class="p-4 bg-light">
                <form action="{{ route('quiz-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <select class="form-control select2" name="juduls_id" id="juduls_id" required autofocus>
                        <option value>Pilih Judul</option>
                        @foreach ($jdl as $item)
                        @if(old('juduls_id') == $item->id)
                          <option value="{{ $item->id }}" selected>{{ $item->judul }}</option>  
                        @else
                          <option value="{{ $item->id }}">{{ $item->judul }}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="pertanyaan" class="form-control-label">Pertanyaan</label>
                        <input class="form-control" name="pertanyaan" type="text" value="{{ old('pertanyaan') }}" required>
                    </div>
                    {{-- <div class="form-group">
                      <label for="pertanyaan" class="form-control-label">Jawaban 1</label>
                      <select class="form-control select2" name="jawaban" required>
                          <option value="0">false</option>
                          <option value="1">true</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pertanyaan" class="form-control-label">Jawaban 2</label>
                      <select class="form-control select2" name="jawaban" required>
                          <option value="0">false</option>
                          <option value="1">true</option>
                      </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="jawaban" class="form-control-label">Jawaban 1</label>
                        <input class="form-control" name="jawaban" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="answer" class="form-control-label">Jawaban 2</label>
                        <input class="form-control" name="answer" type="text" required>
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
