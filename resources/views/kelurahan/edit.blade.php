@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kelurahan') }}</div>

                <div class="card-body">
                <form  action="{{route('kelurahan.update', $kelurahan->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                    @csrf
                     <div class="form-group">
                        <label for="">Asal kecamatan</label>
                        <select name="id_kecamatan" class="form-control" required>
                            @foreach($kecamatan as $data)
                            <option value="{{$data->id}}"
                                {{$data->id == $kelurahan->id_kecamatan ? "selected":""}}>{{$data->nama_kecamatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="">Nama Kelurahan</label>
                         <input type="text" name="nama_kelurahan" class="form-control" required>
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