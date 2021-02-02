@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kasus Local') }}</div>

                <div class="card-body">
                <form  action="{{route('kasus2.store')}}" method="post">
                    @csrf
                
                    <div class="row">
                        <div class="col">
                    @livewireStyles

                        @livewire('tracking')
                  
                   @livewireScripts
                        </div>
                     <!-- <div class="form-group">
                        <label for="">RW</label>
                        <select name="id_rw" class="form-control" required>
                            @foreach($rw as $data)
                                <option value="{{$data->id}}">{{$data->nama_rw}}</option>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Positif</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_positif">
                        @if($errors->has('positif'))
                            <span class="text-danger">{{$errors->first('positif')}}</span>
                        @endif
                     </div>
                     <div class="form-group">
                 
                        <label for="exampleInputPassword1" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_sembuh">
                        @if($errors->has('sembuh'))
                            <span class="text-danger">{{$errors->first('sembuh')}}</span>
                        @endif
                     </div>
                     <div class="form-group">
                 
                        <label for="exampleInputPassword1" class="form-label">Meninggal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_meninggal">
                        @if($errors->has('meninggal'))
                            <span class="text-danger">{{$errors->first('meninggal')}}</span>
                        @endif
                     </div>
                     <div class="form-group">
                 
                        <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal" >
                        @if($errors->has('tanggal'))
                            <span class="text-danger">{{$errors->first('tanggal')}}</span>
                        @endif
                     </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
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