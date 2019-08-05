<<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kelola Kurir </title>

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
    <!-- Datatables -->
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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


       <!-- Tambah Kurir -->
        <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Kurir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form class="form-signin" method="POST" action="/admin/kurir">
                        {{ csrf_field() }}
                  <div class="form-group">
                    <label>Nama Kurir</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Petugas" required>
                  </div>

                   <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Petugas" required>
                  </div>

                  <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="number" name="hp" class="form-control" placeholder="Masukkan No. Telepon Petugas" required>
                  </div>
                  <input type="hidden" name="lokasi_tugas" value="{{Auth::guard('admin')->user()->lokasi}}"> 
                
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Akhir Tambah Petugas -->


        <!-- EditPetugas -->
        <div class="modal fade" id="editPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Kurir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form class="form-signin" method="POST" action="{{ route('kurir.update','kirim') }}">
                         {{ csrf_field() }}  
                         {{ method_field('PATCH') }} 
                         <input type="hidden" name="kurirId" id="kurirId"> 
                         
                  <div class="form-group">
                    <label for="inputName">Nama Kurir</label>
                    <input type="text" id="inputName" name="nama" class="form-control" placeholder="Masukkan Nama Petugas" required>
                  </div>

                   <div class="form-group">
                    <label for="inputAlamat">Alamat</label>
                    <input type="text" id="inputAlamat" name="alamat" class="form-control" placeholder="Masukkan Alamat Petugas" required>
                  </div>

                  <div class="form-group">
                    <label for="inputHp">No. Telepon</label>
                    <input type="number" id="inputHp" name="hp" class="form-control" placeholder="Masukkan No. Telepon Petugas" required>
                  </div>

                
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Akhir Edit Petugas -->

        <!-- Hapus Petugas --> 
  <div class="modal fade" id="deletePetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
        <form action="{{ route('kurir.destroy','hapus') }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
          <div class="modal-header">            
            <h4 class="modal-title">Hapus Kurir</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>Apakah anda yakin untuk menghapus Kurir?</p>
            <input type="hidden" name="petugasIdDelete" id="petugasIdDelete"> 
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-danger" value="Ya">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- akhir hapus Petugas-->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!-- <h3>DONATE <small>Daftar Petugas</small></h3> -->
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Daftar Petugas</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahPetugas" data-whatever="@mdo">Tambah Kurir</button>
                    <!-- start project list -->
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th style="width: 1%">Id</th>
                          <th style="width: 20%">Nama Kurir</th>
                          <th>Alamat</th>
                          <th>Lokasi Tugas</th>
                          <th>No. Telepon</th>
                          <th style="width: 20%">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kurir as $kurir)
                          <tr>
                              <td>{{$kurir->id}}</td>
                              <td>{{$kurir->nama}}</td>
                              <td>{{$kurir->alamat}}</td>
                              <td>{{$kurir->lokasi_tugas}}</td>
                              <td>{{$kurir->no_hp}}</td>
                              <td>
                            <button type="button" data-id="{{$kurir->id}}" data-nama="{{$kurir->nama}}" data-alamat="{{$kurir->alamat}}" data-lokasi="{{$kurir->email}}" data-hp="{{$kurir->no_hp}}" data-toggle="modal" data-target="#editPetugas" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </button>
                            <button type="button" class="btn btn-danger btn-xs" data-id="{{$kurir->id}}" data-toggle="modal" data-target="#deletePetugas"><i class="fa fa-trash-o"></i> Delete </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
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
     <script>
  $('#editPetugas').on('show.bs.modal',function (event) {
    var button = $(event.relatedTarget)
    var nama = button.data('nama') //sesuai data modal
    var alamat = button.data('alamat')
    var lokasi = button.data('lokasi')
    var hp = button.data('hp') 
    var id = button.data('id') 
    var modal = $(this)
    modal.find('.modal-body #inputName').val(nama); // #inputName sesuai id dari form input
    modal.find('.modal-body #inputAlamat').val(alamat);
    modal.find('.modal-body #inputHp').val(hp);
    modal.find('.modal-body #kurirId').val(id);
})
  $('#deletePetugas').on('shown.bs.modal',function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id') 
    var modal = $(this)
    modal.find('.modal-body #petugasIdDelete').val(id);
})
    $(".nav a").on("click", function() {
  $(".nav").find(".active").removeClass("active");
  $(this).parent().addClass("active");
});
</script>
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
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>

    
    <!-- Modal Edit Petugas-->
  

  </body>
</html>
