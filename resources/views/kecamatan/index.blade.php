@extends('master.index')
@section('css')
<!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         @if (session('message'))
                <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message') }}
                </div>
            @elseif(session('message1'))
                <div class="alert alert-danger" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message1') }}
                </div>
            @endif
    
            <div class="card">
             <div class="card-header">{{ __('Data kecamatan') }}
                <a href="{{route('kecamatan.create')}}" class="float-right btn btn-outline-primary">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>   
                      <tr class="bg-dark">
                      <th>No</th>
                            <th>Nama Kota</th>
                            <th>Kode Kecamatan</th>
                            <th>Nama Kecamatan</th>
                            <th>Action</th>
                       </tr>  
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($kecamatan as $data)
                            <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->kota->nama_kota}}</td>
                            <td>{{$data->kode_kecamatan}}</td>
                            <td>{{$data->nama_kecamatan}}</td>
                             <td> 
                                <form action="{{route('kecamatan.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('kecamatan.show',$data->id)}}" class="btn btn-sm btn-success">Show</a> |
                                    <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-sm btn-warning">Edit</a> |
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">
                                     Delete
                                    </button>                                  
                                </form>
                                </td>
                            </tr>
                          @endforeach
                  </tbody>  
                 </table>
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection