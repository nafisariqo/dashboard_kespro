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
              <h6>Edit Quiz</h6>
            </div>
            <div class="p-4 bg-gradient-secondary">
                <form action="{{ route('quiz.edit', $data[0]->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                      <select class="form-control select2" name="juduls_id" id="juduls_id" required autofocus>
                        <option disabled value>Pilih Judul</option>
                        <option value="{{ $data[0]->juduls_id }}">{{ $data[0]->judul }}</option>
                        @foreach ($jdl as $item)
                          <option value="{{ $item->id }}">{{ $item->judul }}</option>
                        @endforeach
                      </select>
                    </div>
                    @foreach ($data as $item) 
                      <div class="form-group">
                          <label for="pertanyaan" class="form-control-label">Pertanyaan</label>
                          <input class="form-control" type="text" name="pertanyaan" value="{{ $item->pertanyaan }}" required>
                      </div>
                      <div class="form-group">
                          <label for="jawaban" class="form-control-label">Jawaban 1</label>
                          <input class="form-control" type="text" name="jawaban" value="{{ $item->jawaban }}" required>
                      </div>
                      <div class="form-group">
                          <label for="answer" class="form-control-label">Jawaban 2</label>
                          <input class="form-control" type="text" name="answer" value="{{ $item->answer }}" required>
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
