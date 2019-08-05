<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Informasi Bencana</title>

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

            

            <!-- sidebar menu -->
            @include('Admin.sidebarPetugas')
            <!-- /sidebar menu -->
    

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
                    <h3>Edit Informasi Bencana</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <form method="POST" action="{{ route('bencana.update',[$bencana->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                      <div class="form-group">
                        <label for="inputName">Nama Bencana</label>
                        <input type="text" id="inputName"  name="nama_bencana" class="form-control" placeholder="Nama Bencana" value="{{$bencana->nama_bencana}}" required>
                        <input type="hidden" name="bencana_id" class="form-control" value="{{$bencana->id}}" readonly>
                      </div>


                       <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" id="kecamatan" class="form-control" name="kecamatan" value="{{$regencies->name}}" readonly>
                      </div>

                      <div class="form-group">
                    <label>Kecamatan</label> 
                            <select name="kecamatan" id="kecamatan" class="form-control" required>
                                <option value="{{$bencana->lokasi_id}}" hidden>{{$bencana->districts['name']}}</option>
                                @foreach($districts as $kec)
                                <option value="<?=$kec->id?>"><?=$kec->name?></option>
                                @endforeach
                            </select>
                  </div>
                   <div class="form-group">
                    <label for="inputName">Waktu Berakhir</label>
                    <input type="date" id="waktu_berakhir" class="form-control" name="waktu_berakhir" value="{{$bencana->waktu_berakhir}}" required>
                  </div>

                      <div class="form-group">
                        <label for="deskripsi-text" class="">Deskripsi</label>
                        <textarea rows="10" class="form-control"  name="deskripsi" value="{{$bencana->deskripsi_bencana}}" placeholder="Masukkan Deskripsi Bencana">{{$bencana->deskripsi_bencana}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="" class="">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                        <br>
                        <img src="{{ asset('img/bencana/'.$bencana->gambar)  }}" alt="Gambar Kamu" id="" width="300" height="150">
                      </div>
              

                      <button type="submit" class="btn btn-success">Simpan</button></a>
                      <a href="/petugas/bencana"><button type="button" class="btn btn-secondary">Kembali</button></a>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
    $("select[name='id_province']").change(function(){
        var id_province = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {id_province:id_province, _token:token},
            success: function(data) {
              $("select[name='id_regencies'").html('');
              $("select[name='id_regencies'").html(data.options);
            }
        });
    });
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
