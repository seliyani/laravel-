@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Kelurahan
                </div>

                <div class="card-body">
                   <div class="form-group">
                     </div>
                     <div class="form-group">
                     <label for="" class="form-label">Asal Kecamatan</label>
                        <input type="text" name="id_kecamatan" class="form-control" value="{{$kelurahan->kecamatan->nama_kecamatan}}" readonly>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kecamatan"
                        value="{{$kelurahan->nama_kelurahan}}" readonly>
                    </div>
                    </div>
                    <div class="form-group">
                         <a href="{{route('kelurahan.index')}}" class="btn btn-primary btn-blok">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection