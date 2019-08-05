<!DOCTYPE html>
<html>
<head>
	<title>Rekomendasi Penjemputan</title>
</head>
<body>
	@foreach($donasi as $c)
	{{$c->nama_donasi}}
	{{$rekomendasi}}
	@endforeach
</body>
</html>