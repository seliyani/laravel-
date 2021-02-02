@extends('master.index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Provinsi') }} 
                </div>
                
                <div class="card">
             

                <div class="card-body" >
                <form action="{{route('provinsi.update',$provinsi->id)}}" method="post">

                    @csrf <!-- untuk mengamankan data yang kita tambahkan -->
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Provinsi</label>
                        <input type="text" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Provinsi</label>
                        <input type="text" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" class="form-control" required >
                    </div>
                    <button type="submit" class="btn btn-primary">Add Data</button>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection