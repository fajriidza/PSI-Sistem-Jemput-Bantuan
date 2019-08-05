<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/navbarlogin.css">
    <link rel="stylesheet" href="/css/formDonasi.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOYROYFc-XcfFCMmw5MVlOZc1Tuh_HC2U"
  type="text/javascript"></script>

    <title>Form Donasi</title>
  </head>
     <body>
       <!-- navbar -->
      @include('User.navbar')
       <!-- akhir navbar -->

       <div class="modal fade" id="tampilkanPeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Pilih Lokasi Penjemputan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
            <div id="googleMap" style="width:100%;height:380px;"></div>
                         
              </div>
            </div>
          </div>
        </div>

    <!-- form donasi -->
    <section class="formDonasi">
      <div class="bg">
        <div class="overlay">
        <div class="row">
          <div class="col-md-8 offset-md-2 form">
            <h1>Form Donasi</h1>
            @if(session()->has('notif'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert-success" aria-label="true">
                  <span aria-hidden="true">&times;</span></button>
                  <strong>Berhasil !! </strong>{{session()->get('notif')}}
            </div>
            @endif
             <form class="" action="{{route('tambah.donasi') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md">
                  <h6>Data Donasi</h6>
                   <label for="">Kategori Donasi</label>
                  {!! Form::select('id_categoris',[''=>'Pilih Kategori Donasi']+$categoris,null,['class'=>'form-control','required']) !!}
                </div>
                <div class="col-md">
                  <h6>Lokasi Penjemputan</h6>
                  <label for="">Nama Donatur</label>
                  <input type="text" name="" value="{{$donatur->name}}" class="form-control" placeholder="M. Sulthon Alif" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <label for="">Jenis Donasi</label>
                   {!! Form::select('id_jenis_donasi',[''=>'Pilih Jenis Donasi'],null,['class'=>'form-control','required']) !!}
                      <label for="">Jumlah Donasi</label>
                    <input type="number" min="0" name="jumlah_donasi" placeholder="Jumlah Donasi" class="form-control" required>
                    </div>
                <div class="col-md">
                 <label for="">Alamat Lengkap</label>
                  <textarea name="name"  class="form-control alamatTxt" style="resize: none" readonly>{{$donatur->alamat}}</textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md">
                  <label for="">Bencana</label>
                  <input type="text" name="nama_bencana" value="{{$bencana->nama_bencana}}" class="form-control" readonly>
                </div>
                <div class="col-md">
                    <label for="">Provinsi Donatur</label>
                  <input type="text" name="" value="{{$donatur->get_lokasi_user->regencies->provinces['name']}}" class="form-control" placeholder="M. Sulthon Alif" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <label for="">Kabupaten/Kota</label>
                    <input type="text" name="" value="{{$bencana->districts->regencies['name']}}"class="form-control" readonly>
                </div>
                <div class="col-md">
                  <label for="">Kabupaten/Kota Donatur</label>
                 <input type="text" name="" value="{{$donatur->get_lokasi_user->regencies['name']}}" class="form-control" placeholder="M. Sulthon Alif" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                 <label for="">Kecamatan</label>
                  <input type="text" name="" value="{{$bencana->districts['name']}}"class="form-control" readonly>
                  <input type="hidden" name="lokasi_id" value="{{$bencana->lokasi_id}}"class="form-control" readonly>
                  <input type="hidden" name="status" value="Menunggu"class="form-control" readonly>
                  <input type="hidden" name="bencana_id" value="{{$bencana->id}}" class="form-control" readonly>
                  <input type="hidden" name="pemilik_id" value="{{ Auth::user()->id }}" class="form-control" readonly>
                </div>

                <div class="col-md">
                  <label for="">Kecamatan Donatur</label>
                  <input type="text" name="" value="{{$donatur->get_lokasi_user['name']}}" class="form-control" placeholder="M. Sulthon Alif" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                   <label for="">Keterangan Donasi</label>
                  <textarea name="deskripsi_donasi" class="form-control" required style="resize: none"></textarea>
                </div>
                <input type="hidden" id="lat" name="lat" value="">
                <input type="hidden" id="lng" name="lng" value="">
              </div> <br>
              <center><div class="btn-group" style="width: 50%" >
                 <button type="submit" style="width: 50%" class="btn btn-outline-primary btnDonasi">Donasi</button>
              <button type="button" style="width: 50%" data-toggle="modal" data-target="#tampilkanPeta" class="btn btn-outline-primary btnDonasi btn-block">Tampilkan Peta</button>
              </div></center>
            </form>
          </div>
        </div>
        <footer>
          <div class="row">
            <div class="col-12">
              <p class="text-center">&copy; Copyright 2018 | Built with by <span>De Nun </span><br>Jalan Kaliurang Km. 14,5, Yogyakarta, Krawitan, Umbulmartani, Ngemplak, Kabupaten Sleman, <br>Daerah Istimewa Yogyakarta 55584 </p>
            </div>
          </div>
        </footer>

      </div>

      </div>
    </section>
    <!-- form donasi -->
    <!-- footer -->

    <!-- akhir footer -->

<script src="/js/jquery-3.3.1.min.js"></script>
 <script type="text/javascript">
  
    $("select[name='id_categoris']").change(function(){
        var id_categoris = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-ajax-kategori') ?>",
            method: 'POST',
            data: {id_categoris:id_categoris, _token:token},
            success: function(data) {
              $("select[name='id_jenis_donasi'").html('');
              $("select[name='id_jenis_donasi'").html(data.options);
            }
        });
    });
  </script> 

    
<script>
  function myFunction() {
  var x = document.getElementById("showMaps")
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}
  
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-7.686495233149646,110.41056990623474),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
  </body>
</html>
