@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Rw
                </div>

                <div class="card-body">
                   <div class="form-group">
                     </div>
                     <div class="form-group">
                     <label for="" class="form-label">Asal Kelurahan</label>
                        <input type="text" name="id_kelurahan" class="form-control" value="{{$rw->kelurahan->nama_kelurahan}}" readonly>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Rw</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama"
                        value="{{$rw->nama}}" readonly>
                    </div>
                    </div>
                    <div class="form-group">
                         <a href="{{route('rw.index')}}" class="btn btn-primary btn-blok">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection