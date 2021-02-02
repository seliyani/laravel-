@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kelurahan
                </div>

                <div class="card-body">
                    <form action="{{route('kelurahan.store')}}" method="POST">
                    @csrf <!-- untuk mengamankan data yang kita tambahkan -->
                    <div class="form-group" >
                        <label for="id_kecamatan">Nama Kecamatan</label>
                        <select name="id_kecamatan" id="id_kecamatan" class="form-control" required>
                        @foreach($kecamatan as $data)
                        <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="">Nama Kelurahan</label>
                         <input type="text" name="nama_kelurahan" class="form-control" id="exampleInputEmail1" place>
                        @if($errors->has('nama_kelurahan'))
                          <span class="text-danger">{{ $errors->first('nama_kelurahan') }}</span>
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
