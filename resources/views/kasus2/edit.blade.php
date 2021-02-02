@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kasus Local') }}</div>

                <div class="card-body">
                <form  action="{{route('kasus2.update',$kasus2->id)}}" method="post">
               
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col">
                    @livewireStyles
                        @livewire('tracking',['selectedRw' => $kasus2->id_rw,
                        'selectedKel' => $kasus2->rw->id_kelurahan,
                        'selectedKec' => $kasus2->rw->kelurahan->id_kecamatan,
                        'selectedKot' => $kasus2->rw->kelurahan->kecamatan->id_kota,
                        'selectedPro' => $kasus2->rw->kelurahan->kecamatan->kota->id_provinsi])
                    @livewireScripts
                    </div>
                        

                    <hr color="blue">
                     <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Positif</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_positif"
                        value="{{$kasus2->jumlah_positif}}">

                        @if($errors->has('positif'))
                            <span class="text-danger">{{$errors->first('positif')}}</span>
                        @endif

                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_sembuh"
                        value="{{$kasus2->jumlah_sembuh}}">
                        @if($errors->has('sembuh'))
                            <span class="text-danger">{{$errors->first('sembuh')}}</span>
                        @endif
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Meninggal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_meninggal"
                        value="{{$kasus2->jumlah_meninggal}}">

                        @if($errors->has('meninggal'))
                            <span class="text-danger">{{$errors->first('meninggal')}}</span>
                        @endif
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal"
                        value="{{$kasus2->tanggal}}">

                        @if($errors->has('tanggal'))
                            <span class="text-danger">{{$errors->first('tanggal')}}</span>
                        @endif
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
    </div>
</div>
@endsection