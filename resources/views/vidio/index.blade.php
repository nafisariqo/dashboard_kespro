@extends('master')

@section('konten')

<div class="card p-4">  
    <div class="col-2">
        <a class="btn bg-gradient-primary mt-4 mb-0" href="{{ route('vidio-create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Video</a>
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
    <h6>Video Learning Table</h6>
      <table id="example" class="table table-striped" style="width:100%">
          <thead>
              <tr>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Video</th>
                  <th>Publish at</th>
                  <th>Proof By</th>
                  <th>Penjelasan</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($vidio as $item)
            <tr>
              <td>
                <img src="{{ asset('gmbrVideo/'.$item->gambar) }}" style="width: 70px;">
              </td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->video }}</td>
              <td>{{ $item->created_at->format('D, d M Y') }}</td>
              <td>{{ $item->proofby}}</td>
              <td>
                <div class="ms-auto">
                    <a class="btn btn-link text-info px-3 mb-0" href="{{ route('penjelasan-show', $item->id) }}">Show More</a>
                </div>
              </td>
              <td>
                  <div class="ms-auto text-end">
                      <a class="btn btn-link text-danger text-gradient px-3 mb-0 delete" vid-id="{{ $item->id }}" href="#" ><i class="far fa-trash-alt me-2"></i>Delete</a>
                      <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('vidio-update', $item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
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
        var vidid = $(this).attr('vid-id')
        swal({
            title: "Are you sure?",
            text: "You will delete video with id "+vidid+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "vidio/delete/"+vidid+""
                swal({
                    title: "Your video has been delete",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000,
                });
            } else {
                swal({
                    title: "Your video is safe",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000,
                });
            }
        });
    });
</script>
@endpush

 