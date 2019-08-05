<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/navbarlogin.css">
    <link rel="stylesheet" href="/css/detailBencana.css">

    <title>Detail Bencana</title>
  </head>
     <body>
        <!-- navbar -->
    @include('User.navbar')
    <!-- akhir navbar -->

    <!-- detail bencana -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">


        <div class="row">
          <div class="col-md-10 offset-md-1">
            <h1 >{{$bencana->nama_bencana}}</h1>
            <div class="row">
              <div class="col-md-6">
                <img src="{{ asset('img/bencana/'.$bencana->gambar)  }}" class="img-fluid shadow p-1 mb-2 bg-white rounded" alt="" style="height:310px;width:560px;">
                <div class="lokasi">
                  <i class="fas fa-map-marker-alt"></i>Lokasi Bencana : {{$bencana->districts['name']}},{{$bencana->districts->regencies['name']}} , {{$bencana->districts->regencies->provinces['name']}}
                </div>
                <div class="Waktu">
                  <i class="fas fa-calendar-alt"></i>Waktu Berakhir : {{date("m-d-Y", strtotime($bencana->waktu_berakhir))}}
                </div>
              </div>
              <div class="col-md-6">
                <h4>Deskripsi</h4>
                <p>{{$bencana->deskripsi_bencana}}.</p>
                <form action="{{ route('donasi.bencana',[$bencana->id]) }}" method="get">
                  <button type="submit" class="col-md-4 offset-md-4 btn btn-primary btnDonasi"><i class="fas fa-hand-holding-usd fa-lg"></i>  Donasi</button>
                  </form>
                  <div class="row">
                    <div class="col-md-4 offset-md-4 d-flex justify-content-center">
                    </div>
                  </div>
              </div>
          </div>

        </div>

      </div>
      <footer>
        <div class="row">
          <div class="col-10 offset-1 text-center">
            <p>&copy; Copyright 2018 | Built with by <span>De Nun </span><br>Jalan Kaliurang Km. 14,5, Yogyakarta, Krawitan, Umbulmartani, Ngemplak, Kabupaten Sleman, <br>Daerah Istimewa Yogyakarta 55584 </p>
          </div>
        </div>
      </footer>
        </div>

      </div>
    <!-- akhir detail bencana -->

    <!-- footer -->

    <!-- akhir footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
  </body>
</html>
