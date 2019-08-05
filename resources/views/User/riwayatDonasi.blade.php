<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/riwayat.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/DataTables/css/jquery.dataTables.min.css">

    <title>Riwayat Donasi</title>
  </head>
     <body>
      <!-- navbar -->
      @include('User.navbar')
    <!-- akhir navbar -->

    <!-- Detail Donasi -->
    <div class="modal fade" id="detailDonasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Riwayat Donasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-signin">
              <div class="row">
                <div class="col-md-6">
               
                  <div class="form-group">
                 <label>Kode Donasi</label>
                    <input type="text" id="inputKode" class="form-control" value="" placeholder="KB41AA" required readonly>
                  </div>
                   <div class="form-group">
                 
                </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputAlamat">Nama Donasi</label>
                    <input type="text" id="inputNama" class="form-control" placeholder="Tenda Sedang" required readonly>
                  </div>

                 
                </div>
              </div>
            </form>
            <label>Keterangan</label>
                    <textarea id="deskripsi" name="deskripsi_donasi" class="form-control" required style="resize: none" readonly></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Detail Donasi -->

      <div class="bg">
        <div class="overlay">

      <div class="row">

        <div class="col-sm-8 offset-sm-2 form ">
              <h2 class="text-center">Riwayat Donasi</h2>

              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Nama Donasi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Tujuan Donasi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($donasi as $donasi)
                  <tr>
       
                    <td>{{$donasi->get_jenisDonasi['jenis_kategori']}}</td>
                    <td>{{$donasi->jumlah_donasi}}</td>
                    <td>{{$donasi->get_jenisDonasi->kategori['kategori_nama']}}</td>
                    <td>{{$donasi->get_tujuanDonasi['name']}}</td>
                    <td>{{$donasi->status}}</td>
                    <td>
                      <button type="button"  data-kode="{{$donasi->kode_donasi}}" data-deskripsi="{{$donasi->deskripsi_donasi}}" data-nama="{{$donasi->get_jenisDonasi['jenis_kategori']}}" data-jumlah="{{$donasi->jumlah_donasi}}" class="btn btn-outline-success btn-xs" alt="" data-toggle="modal" data-target="#detailDonasi" data-whatever="@mdo"><i class="fas fa-info-circle"></i> Detail</button>
                    </td>
                  </tr>
                 @endforeach()
                </tbody>
              </table>


            </div>
            </div>

                 <!-- footer -->
                 <footer>
                   <div class="row">
                     <div class="col-10 offset-1 text-center">
                       <p>&copy; Copyright 2018 | Built with by <span>De Nun </span><br>Jalan Kaliurang Km. 14,5, Yogyakarta, Krawitan, Umbulmartani, Ngemplak, Kabupaten Sleman, <br>Daerah Istimewa Yogyakarta 55584 </p>
                     </div>
                   </div>
                 </footer>
                <!-- akhir footer -->
              </div>
            </div>

    </body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
    <script src="/DataTables/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#myTable').DataTable();
      } );
    </script>
    <script>
  $('#detailDonasi').on('show.bs.modal',function (event) {
    var button = $(event.relatedTarget)
    var nama = button.data('nama') //sesuai data modal
    var kode = button.data('kode')
    var jenis = button.data('jenis')
    var jumlah = button.data('jumlah') 
    var deskripsi = button.data('deskripsi') 
    var modal = $(this)
    modal.find('.modal-body #inputNama').val(nama); // #inputName sesuai id dari form input
    modal.find('.modal-body #inputKode').val(kode);
    modal.find('.modal-body #inputJumlah').val(jumlah);
    modal.find('.modal-body #inputJenis').val(jenis);
    modal.find('.modal-body #deskripsi').val(deskripsi);
})
</script>
  </body>
</html>
