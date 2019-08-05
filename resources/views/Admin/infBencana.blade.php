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
   

         <!-- Tambah Bencana -->
        <div class="modal fade" id="tambahBencana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Informasi Bencana</h3>
              </div>
              <div class="modal-body">
                <form class="form-signin" action="{{ route('bencana.store') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
                  <div class="form-group">
                    <label for="inputName">Nama Bencana</label>
                    <input type="text" id="inputName" class="form-control" name="NamaBencana" placeholder="Masukkan Nama Bencana" required>
                    <input type="hidden" name="admin_id" value="{{Auth::guard('admin')->user()->id}}">
                  </div>

                  <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <input type="text" id="kecamatan" class="form-control" name="kecamatan" value="{{$regencies->name}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-control" required>
                                <option value="" disabled selected hidden>Pilih Kecamatan</option>
                                @foreach($districts as $kec)
                                <option value="<?=$kec->id?>"><?=$kec->name?></option>
                                @endforeach
                            </select>
                  </div>
                  <div class="form-group">
                    <label for="inputName">Waktu Berakhir</label>
                    <input type="date" id="waktu_berakhir" class="form-control" name="waktu_berakhir" required>
                  </div>
<!--
                  <div class="form-group">
                    <label for="inputName">Provinsi</label>
                    {!! Form::select('id_province',[''=>'Provinsi']+$provinces,34,['class'=>'form-control','required']) !!}
                  </div>

                  <div class="form-group">
                    <label for="inputName">Kabupaten/Kota</label>
                   {!! Form::select('id_regencies',[''=>'Pilih Kabupaten/Kota'],null,['class'=>'form-control','required']) !!}
                  </div>
   -->           

                  <div class="form-group">
                    <label for="deskripsi-text" class="">Deskripsi</label>
                    <textarea  rows="10" class="form-control" placeholder="Masukkan Deskripsi Bencana" id="deskripsi-text" style="resize: none" name="deskripsi_bencana"></textarea>
                  </div>

                  <div class="form-group">
                    <input type="file" id="inputgambar" name="gambar" class="validate"/ accept="image/*" / enctype="multipart/form-data"required >
                    <br>
                </div>
               
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
              </div>
               </form>
            </div>
          </div>
        </div>
        <!-- Akhir Tambah Bencana -->
 <!-- Hapus Bencana --> 
  <div class="modal fade" id="deleteBencana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
        <form action="{{ route('bencana.destroy','hapus') }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
          <div class="modal-header">            
            <h4 class="modal-title">Hapus Bencana</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>Apakah anda yakin untuk menghapus Bencana?</p>
            <input type="hidden" name="bencanaIdDelete" id="bencanaIdDelete"> 
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
<!-- akhir hapus Bencana-->
<!-- akhir hapus Bencana-->

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
                    <h3>Informasi Bencana</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahBencana" data-whatever="@mdo">Tambah Bencana</button>
                    <!-- start project list -->
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th style="width: 1%">Id</th>
                          <th style="width: 15%">Nama Bencana</th>
                          <th>Kabupaten/Kota</th>
                          <th>Kecamatan</th>
                          <th>Deskripsi</th>
                          <th>Waktu Berakhir</th>
                          <th>Gambar</th>
                          <th style="width: 15%">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($bencana as $bencana)
                        <tr>
                          <td>{{$bencana->id}}</td>
                          <td><a href="{{route('detail.bencana',[$bencana->id])}}">{{$bencana->nama_bencana}}</a></td>
                          <td>{{$bencana->districts->regencies['name']}}</td>
                          <td>{{$bencana->districts['name']}}</td>
                          <td>{{str_limit($bencana->deskripsi_bencana,50)}}</td>
                          <td>{{$bencana->waktu_berakhir}}</td>
                          <td><img src="{{ asset('img/bencana/'.$bencana->gambar)  }}" alt="" width="150" height="75"> </td>
                          <td>
                            <a href="{{route('bencana.edit',[$bencana->id])}}" class="btn btn-info btn-xs" alt=""><i class="fa fa-pencil"></i> Edit </a>
                            <button type="button" class="btn btn-danger btn-xs" data-id="{{$bencana->id}}" data-toggle="modal" data-target="#deleteBencana"><i class="fa fa-trash-o"></i> Delete </button>
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

    <script>

  $('#deleteBencana').on('shown.bs.modal',function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id') 
    var modal = $(this)
    modal.find('.modal-body #bencanaIdDelete').val(id);
})
</script> 
  </body>
</html>
