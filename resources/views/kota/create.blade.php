@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kota
                </div>

                <div class="card-body">
                    <form action="{{route('kota.store')}}" method="POST">
                    @csrf <!-- untuk mengamankan data yang kita tambahkan -->
                    <div class="form-group" >
                        <label for="id_provinsi">Nama Provinsi</label>
                        <select name="id_provinsi" id="id_provinsi" class="form-control" required>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="">Nama Kota</label>
                         <input type="text" name="nama_kota" class="form-control" id="exampleInputEmail1" place>
                         @if($errors->has('nama_kota'))
                          <span class="text-danger">{{ $errors->first('nama_kota') }}</span>
                        @endif
                    </div>
                    <div class="form-group" >
                        <label for="">Kode Kota</label>
                        <input type="number" name="kode_kota" class="form-control" id="exampleInputEmail1" place>
                        @if($errors->has('kode_kota'))
                          <span class="text-danger">{{ $errors->first('kode_kota') }}</span>
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
