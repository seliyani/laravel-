@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Kota
                </div>

                <div class="card-body">
                   <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Kode Kota</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kode_kota"
                        value="{{$kota->kode_kota}}" readonly>
                    </div>
                     </div>
                     <div class="form-group">
                     <label for="" class="form-label">Asal Provinsi</label>
                        <input type="text" name="id_provinsi" class="form-control" value="{{$kota->provinsi->nama_provinsi}}" readonly>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kota"
                        value="{{$kota->nama_kota}}" readonly>
                    </div>
                    </div>
                    <div class="form-group">
                         <a href="{{route('kota.index')}}" class="btn btn-primary btn-blok">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection