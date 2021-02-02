@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kecamatan
                </div>

                <div class="card-body">
                    <form action="{{route('kecamatan.store')}}" method="POST">
                    @csrf <!-- untuk mengamankan data yang kita tambahkan -->
                    <div class="form-group" >
                        <label for="id_kota">Nama Kota</label>
                        <select name="id_kota" id="id_kota" class="form-control" required>
                        @foreach($kota as $data)
                        <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="">kode Kecamatan</label>
                         <input type="number" name="kode_kecamatan" class="form-control"  id="exampleInputEmail1" place>
                         @if($errors->has('kode_kecamatan'))
                          <span class="text-danger">{{ $errors->first('kode_kecamatan') }}</span>
                        @endif
                    </div>
                    <div class="form-group" >
                        <label for="">Nama Kecamatan</label>
                        <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputEmail1" place>
                        @if($errors->has('nama_kecamatan'))
                          <span class="text-danger">{{ $errors->first('nama_kecamatan') }}</span>
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
