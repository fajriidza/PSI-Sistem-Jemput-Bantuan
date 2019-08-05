<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Donatur</title>

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
                <!-- <h3>DONATE <small>Informasi Bencana</small></h3> -->
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Detail Daftar Donatur</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <form class="form-signin">
                      <div class="row">
                        <div class="col-md-4">
                          <h5>Daftar Donatur</h5>
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
                            <label for="inputHp">Jenis Donasi</label>
                            <input type="text" id="inputHp" class="form-control" value="{{$donasi->get_jenisDonasi['kategori_nama']}}" required readonly>
                          </div>
                          <div class="form-group">
                            <label for="inputHp">Nama Donasi</label>
                            <input type="text" id="inputHp" class="form-control" value="{{$donasi->nama_donasi}}" required readonly>
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
                           <input type="date" id="inputJadwal" name="jadwal" value="{{$donasi->jadwal_jemput}}" class="form-control" required readonly>
                         </div>
                          <div class="form-group">
                           <label for="inputAlamat">Waktu Penjemputan</label>
                           <input type="time" id="inputWaktu" class="form-control" value="{{$donasi->waktu_jemput}}" name="waktu" required readonly>
                         </div>
                      
                         <div class="form-group">
                           <label for="inputStatus">Status</label>
                           <input type="ttext" id="inputWaktu" class="form-control" value="{{$donasi->status}}" name="status" required readonly>
                         </div>

                        </div>
                         @if($donasi->lokasi_id != NULL)
                        <div class="col-md-4">
                          <h5>Data Bencana</h5>
                          <div class="form-group">
                            <label for="inputHp">Nama Bencana</label>
                            <input type="text" id="inputHp" class="form-control" value="{{$donasi->get_dataBencana['nama_bencana']}}" placeholder="Gempa Bumi" required readonly>
                          </div>
                          <div class="form-group">
                           <label for="inputAlamat">Kabupaten</label>
                           <input type="text" id="inputAlamat" class="form-control" value="{{$donasi->get_tujuanDonasi->regencies['name']}}" placeholder="" required readonly>
                          </div>
                         <div class="form-group">
                          <label for="inputAlamat">Kecamatan</label>
                          <input type="text" id="inputAlamat" class="form-control" value="{{$donasi->get_tujuanDonasi['name']}}" placeholder="" required readonly>
                         </div>
                        <div class="form-group">
                         <label for="inputAlamat">Deskripsi</label>
                         <textarea class="form-control" name="ketDonasi" style="resize: none" rows="5" cols="80" required readonly>{{$donasi->get_dataBencana['deskripsi_bencana']}}</textarea>
                       </div>
                       <div class="form-group">
                            <label for="inputHp">Penjemput</label>
                            <input type="text" id="inputHp" class="form-control" value="{{$donasi->get_kurir['nama']}}" required readonly>
                          </div>
                        </div>
                        @else
                        <div class="col-md-4">
                          <h5>Data Bencana</h5>
                          <div class="form-group">
                            <label for="inputHp">Nama Bencana</label>
                            <input type="number" id="inputHp" class="form-control" placeholder="Bencana" required readonly>
                          </div>
                          <div class="form-group">
                           <label for="inputAlamat">Provinsi</label>
                           <input type="text" id="inputAlamat" class="form-control" placeholder="Provinsi" required readonly>
                          </div>
                         <div class="form-group">
                          <label for="inputAlamat">Kabupaten/Kota</label>
                          <input type="text" id="inputAlamat" class="form-control" placeholder="Kabupaten" required readonly>
                         </div>
                        <div class="form-group">
                         <label for="inputAlamat">Deskripsi</label>
                         <textarea class="form-control" name="ketDonasi" rows="5" cols="80" style="resize: none" required readonly></textarea>
                       </div>
                       <div class="form-group">
                            <label for="inputHp">Penjemput</label>
                            <input type="text" id="inputHp" class="form-control" value="Kurir" required readonly>
                          </div>
                       
                        </div>
                        @endif
                      </div>
                       <a href="/admin/donatur"><button type="button" class="btn btn-danger">Kembali</button></a>
                    </form>
                    <!-- end project list -->

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
