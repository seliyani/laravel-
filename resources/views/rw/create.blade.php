@extends('master.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Rw
                </div>

                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="POST">
                    @csrf <!-- untuk mengamankan data yang kita tambahkan -->
                    <div class="form-group" >
                        <label for="id_kelurahan">Nama Kelurahan</label>
                        <select name="id_kelurahan" id="id_kelurahan" class="form-control" required>
                        @foreach($kelurahan as $data)
                        <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="">Nama Rw</label>
                         <input type="number" name="nama" class="form-control" id="exampleInputEmail1" place>
                        @if($errors->has('nama'))
                          <span class="text-danger">{{ $errors->first('nama') }}</span>
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
