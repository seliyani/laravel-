@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Rw') }}</div>

                <div class="card-body">
                <form  action="{{route('rw.update', $rw->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                    @csrf
                     <div class="form-group">
                        <label for="">Asal kelurahan</label>
                        <select name="id_kelurahan" class="form-control" required>
                            @foreach($kelurahan as $data)
                            <option value="{{$data->id}}"
                                {{$data->id == $rw->id_kelurahan ? "selected":""}}>{{$data->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="">Nama Rw</label>
                         <input type="text" name="nama" class="form-control" required>
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