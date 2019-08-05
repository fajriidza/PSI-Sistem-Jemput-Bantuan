<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jemput Bantuan</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOYROYFc-XcfFCMmw5MVlOZc1Tuh_HC2U"
  type="text/javascript"></script>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
    <link href="/css/gaya.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-cube"></i> <span>DONATE</span></a>
            </div>

            <div class="clearfix"></div>

            @include('Admin.sidebarPetugas')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">

              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Atur Jadwal Penjemputan</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                     <form method="POST" action="{{ route('admin.atur_jadwal',[$donasi->id]) }}" enctype="multipart/form-data">
                         {{ csrf_field() }}  
                         {{ method_field('PUT') }} 
                      <div class="row">
                        <div class="col-md-4">
                          <h5>Data Donatur</h5>
                          <div class="form-group">
                             <label for="inputName">Nama Lengkap</label>
                            <input type="text" id="inputName" class="form-control" value="{{$donasi->get_dataUser['name']}}" required readonly>
                          </div>

                          <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" id="inputEmail" class="form-control" value="{{$donasi->get_dataUser['email']}}" required readonly>
                          </div>

                          <div class="form-group">
                            <label for="inputHp">No. Telepon</label>
                            <input type="number" id="inputHp" class="form-control" value="{{$donasi->get_dataUser['no_hp']}}" required readonly>
                          </div>

                           <div class="form-group">
                            <label for="inputAlamat">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" rows="5" style="resize: none" cols="80" required readonly>{{$donasi->get_dataUser['alamat']}}</textarea>
                          </div>

                          <div class="form-group">
                           <label for="inputAlamat">Provinsi</label>
                           <input type="text" id="inputProvinsi" class="form-control" value="{{$donasi->get_dataUser->get_lokasi_user->regencies->provinces['name']}}" required readonly>
                         </div>

                         <div class="form-group">
                          <label for="inputAlamat">Kabupaten/Kota</label>
                          <input type="text" id="inputKab" class="form-control" value="{{$donasi->get_dataUser->get_lokasi_user->regencies['name']}}" required readonly>
                        </div>

                        <div class="form-group">
                         <label for="inputAlamat">Kecamatan</label>
                         <input type="text" id="inputKec" class="form-control" value="{{$donasi->get_dataUser->get_lokasi_user['name']}}" required readonly>
                       </div>
                        </div>
                        <div class="col-md-4">
                          <h5>Data Donasi</h5>
                          <div class="form-group">
                            <label for="inputHp">Kategori Donasi</label>
                            <input type="text" id="inputHp" class="form-control" value="{{$donasi->get_jenisDonasi->kategori['kategori_nama']}}" required readonly>
                          </div>
                          <div class="form-group">
                            <label for="inputHp">Jenis Donasi</label>
                            <input type="text" id="inputHp" class="form-control" value="{{$donasi->get_jenisDonasi['jenis_kategori']}}" required readonly>
                          </div>
                          <div class="form-group">
                            <label for="inputHp">Jumlah</label>
                            <input type="number" id="inputHp" class="form-control" value="{{$donasi->jumlah_donasi}}" required readonly>
                          </div>
                        <div class="form-group">
                         <label for="inputAlamat">Keterangan Donasi</label>
                         <textarea class="form-control" name="ketDonasi" rows="5" style="resize: none" cols="80" required readonly>{{$donasi->deskripsi_donasi}}</textarea>
                         </div>
                        
                         <div class="form-group">
                           <label for="inputName">Jadwal Penjemputan</label>
                           <input type="date" id="inputJadwal" name="jadwal" value="{{$donasi->jadwal_jemput}}" class="form-control" required>
                         </div>
                          <div class="form-group">
                           <label for="inputAlamat">Waktu Penjemputan</label>
                           <input type="time" id="inputWaktu" class="form-control" value="{{$donasi->waktu_jemput}}" name="waktu" required>
                         </div>
                      
                         <div class="form-group">
                           <label for="inputStatus">Status</label>
                           <select class="form-control" name="status">
                              <option value="{{$donasi->status}}" hidden>{{$donasi->status}}</option>
                              <option value="Komitmen">Komitmen</option>
                              <option value="Siap Jemput">Siap Jemput</option>
                              <option value="Telah Dijemput">Telah Dijemput</option>
                              <input type="hidden" id="donasiId"  name="donasiId" class="form-control" placeholder="" required>
                            </select>
                         </div>
                        </div>
                        <div class="col-md-4">
                          <h5>Data Bencana</h5>
                          <div class="form-group">
                            <label for="inputHp">Nama Bencana</label>
                            <input type="text" id="inputHp" class="form-control" value="{{$donasi->get_dataBencana['nama_bencana']}}" required readonly>
                          </div>
                          <div class="form-group">
                           <label for="inputAlamat">Provinsi</label>
                           <input type="text" id="inputAlamat" class="form-control" value="{{$donasi->get_tujuanDonasi->regencies->provinces['name']}}" placeholder="Provinsi" required readonly>
                          </div>
                         <div class="form-group">
                          <label for="inputAlamat">Kabupaten/Kota</label>
                          <input type="text" id="inputAlamat" class="form-control" value="{{$donasi->get_tujuanDonasi->regencies['name']}}" placeholder="Kabupaten/Kota" required readonly>
                         </div>
                         <div class="form-group">
                          <label for="inputAlamat">Kecamatan</label>
                          <input type="text" id="inputAlamat" class="form-control" value="{{$donasi->get_tujuanDonasi['name']}}" placeholder="Kecamatan" required readonly>
                         </div>
                        <div class="form-group">
                         <label for="inputAlamat">Deskripsi</label>
                         <textarea class="form-control" name="ketDonasi" rows="5" cols="80" style="resize: none" required readonly>{{$donasi->get_dataBencana['deskripsi_bencana']}}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="inputStatus">Dijemput Oleh</label>
                           <select class="form-control" name="dijumput_oleh">
                              <option hidden>Pilih Kurir</option>
                              @foreach($kurir as $kurir)
                              <option value="<?=$kurir->id?>"><?=$kurir->nama?></option>
                              @endforeach
                            </select>
                         </div>
                      </div>

                      </div>
                       <button type="submit" class="btn btn-success">Simpan</button></a>
                       <a href="/admin/jemput"><button type="button" class="btn btn-danger">Kembali</button></a>
                         @if($donasi->latitude != null)
                       <button type="button" data-toggle="modal" data-target="#tampilkanPeta"class="btn btn-primary">Tampilkan Peta</button>
                       @endif
                    </form>
                    <!-- end project list -->

                     <div class="modal fade" id="tampilkanPeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">Lokasi Penjemputan</h4>
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

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Teknik Informatika UII - Admin Design by De Nun
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

 <script>
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng({{$donasi->latitude}},{{$donasi->longitude}}),
    zoom:20,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng({{$donasi->latitude}},{{$donasi->longitude}}),
      map: peta
  });

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/vendors/moment/min/moment.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>

  </body>
</html>
