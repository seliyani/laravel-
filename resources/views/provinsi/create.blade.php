@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Provinsi
                </div>

                <div class="card-body">
                    <form action="{{route('provinsi.store')}}" method="POST">
                    @csrf <!-- untuk mengamankan data yang kita tambahkan -->
                    <div class="form-group" >
                        <label for="">Kode Provinsi</label>
                        <input type="number" name="kode_provinsi" class="form-control" id="exampleInputEmail1" place>
                        @if($errors->has('kode_provinsi'))
                          <span class="text-danger">{{ $errors->first('kode_provinsi') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                         <label for="">Nama Provinsi</label>
                         <input type="text" name="nama_provinsi" class="form-control" id="exampleInputEmail1" place>
                         @if($errors->has('nama_provinsi'))
                          <span class="text-danger">{{ $errors->first('nama_provinsi') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-sm">Simpan</button>
                        </div>
                     </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
