@extends('master')

@section('konten')

<div class="card p-4">  
   <div class="col-2">
        <a class="btn bg-gradient-primary mt-4 mb-0" href="{{ route('judul-create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Judul</a>
    </div>
    <div class="col-2">
        <a class="btn bg-gradient-primary mt-4 mb-0" href="{{ route('quiz-create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Quiz</a>
    </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Success!</strong> {{ $message }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif 
  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"> {{ $message }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  <div class="card-header pb-4">
    <h6>Judul Table</h6>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($jdl as $row)
          <tr>
            <td>{{ $row->judul }}</td>
            <td>
                <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0 deljdl" data-id="{{ $row->id }}" href="#" ><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('judul.update', $row->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                </div>
            </td>
          </tr>  
        @endforeach
        </tbody>
    </table>
    <h6>Quiz Table</h6>
      <table id="example" class="table table-striped" style="width:100%">
          <thead>
              <tr>
                  <th>Judul</th>
                  <th>Pertanyaan</th>
                  <th>Jawaban 1</th>
                  <th>Jawaban 2</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <td>{{ $item->judul }}</td>
              <td>{{ $item->pertanyaan }}</td>
              <td>{{ $item->jawaban }}</td>
              <td>{{ $item->answer }}</td>
              <td>
                  <div class="ms-auto">
                      <a class="btn btn-link text-danger text-gradient px-3 mb-0 delete" data-id="{{ $item->id }}" href="#" ><i class="far fa-trash-alt me-2"></i>Delete</a>
                      <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('quiz.update', $item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
              </td>
            </tr>  
            @endforeach
          </tbody>
      </table>
  </div>
</div>
    
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script>
        $(document).ready(function() {
            setTimeout (function () {
                $('.alert').hide();
            }, 5000);
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

@push('addon-script')
<script>
    $('.delete').click(function(){
        var quizid = $(this).attr('data-id')
        swal({
            title: "Are you sure?",
            text: "You will delete data question with id "+quizid+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "delete/"+quizid+""
                swal("Your question has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your question is safe!");
            }
        });
    });
</script>
@endpush

@push('addon-script')
<script>
    $('.deljdl').click(function(){
        var jdlid = $(this).attr('data-id')
        swal({
            title: "Are you sure?",
            text: "You will delete data title with id "+jdlid+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "delete/"+jdlid+""
                swal("Your question has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your question is safe!");
            }
        });
    });
</script>
@endpush
 