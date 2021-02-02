@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kecamatan') }}</div>

                <div class="card-body">
                <form  action="{{route('kecamatan.update', $kecamatan->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                    @csrf
                     <div class="form-group">
                        <label for="">Asal kecamatan</label>
                        <select name="id_kota" class="form-control" required>
                            @foreach($kota as $data)
                            <option value="{{$data->id}}"
                                {{$data->id == $kecamatan->id_kota ? "selected":""}}>{{$data->nama_kota}}</option>
                            @endforeach
                        </select>
                        <label for="exampleInputEmail1" class="form-label">Kode Kecamatan</label>
                        <input type="text" name="kode_kecamatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                         <label for="">Nama Kecamatan</label>
                         <input type="text" name="nama_kecamatan" class="form-control" required>
                    </div>
                     </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection