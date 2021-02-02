@extends('master.index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data kota') }} 
                </div>
                
                <div class="card">
             

                <div class="card-body" >
                <form action="{{route('kota.update',$kota->id)}}" method="post">

                    @csrf <!-- untuk mengamankan data yang kita tambahkan -->
                    @method('PUT')
                    <div class="form-group" >
                        <label for="">Nama Provinsi</label>
                        <select type="text" name="id_provinsi" class="form-control" required>
                            @foreach($provinsi as $data)
                             <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                             @endforeach
                             <select>
                    </div>
                    <div class="form-group" >
                        <label for="">Kode Kota</label>
                        <input type="text" name="kode_kota" class="form-control" required>
                    </div>
                    <div class="form-group">
                         <label for="">Nama Kota</label>
                         <input type="text" name="nama_kota" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Data</button>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection