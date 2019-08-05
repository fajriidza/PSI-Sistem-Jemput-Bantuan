@if(!empty($regencies))
<option value="">Pilih Kabupaten/Kota</option>
  @foreach($regencies as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif

@if(!empty($districts))
<option value="">Pilih Kecamatan</option>
  @foreach($districts as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif