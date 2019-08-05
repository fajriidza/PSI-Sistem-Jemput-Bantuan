@if(!empty($jenis_kategoris))
<option value="">Pilih Jenis Donasi</option>
  @foreach($jenis_kategoris as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif