<div>
    <div class="form-group">
        <label class="">Provinsi</label>

            <select name="" wire:model="selectedPro" class="form-control">
                <option value="" selected>Pilih Provinsi</option>
                @foreach($provinsi as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_provinsi }}</option>
                @endforeach
            </select>
    </div>

    @if (!is_null($selectedPro))
        <div class="form-group">
            <label for="city" class="">Kota</label>

           
                <select wire:model="selectedKot" class="form-control" name="id_kota">
                    <option value="" selected>Pilih Kota</option>
                    @foreach($kota as $data2)
                        <option value="{{ $data2->id }}">{{ $data2->nama_kota }}</option>
                    @endforeach
                </select>
        </div>
    @endif

    @if (!is_null($selectedKot))
        <div class="form-group">
            <label for="city" class="">Kecamatan</label>

           
                <select wire:model="selectedKec" class="form-control" name="id_kecamatan">
                    <option value="" selected>Pilih Kecamatan</option>
                    @foreach($kecamatan as $data3)
                        <option value="{{ $data3->id }}">{{ $data3->nama_kecamatan }}</option>
                    @endforeach
                </select>
        </div>
    @endif

    @if (!is_null($selectedKec))
        <div class="form-group">
            <label  for="city" class="">Kelurahan</label>

           
                <select wire:model="selectedKel" class="form-control" name="id_kelurahan">
                    <option value="" selected>Pilih Kelurahan</option>
                    @foreach($kelurahan as $data4)
                        <option value="{{ $data4->id }}">{{ $data4->nama_kelurahan }}</option>
                    @endforeach
                </select>
        </div>
    @endif

    @if (!is_null($selectedKel))
        <div class="form-group">
            <label  for="city" class="">Rw</label>

           
                <select wire:model="selectedRw" class="form-control" name="id_rw">
                    <option value="" selected>Pilih rw</option>
                    @foreach($rw as $data5)
                        <option value="{{ $data5->id }}">{{ $data5->id}}</option>
                    @endforeach
                </select>
        </div>
    @endif

   </div>