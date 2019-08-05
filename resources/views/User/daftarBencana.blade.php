<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbarlogin.css">
    <link rel="stylesheet" href="/css/daftarBencana.css">

    <title>DONATE</title>
  </head>
     <body>
       <!-- navbar -->  
       @include('User.navbar')
       <!-- akhir navbar -->

    <!-- detail bencana -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container-fluid">
        
        <div class="col-md-10 offset-md-1">
          <h2 class="text-center">Daftar Bencana</h2>
          
          <div class="row">
           @foreach ($bencana as $bencana)
          <div class="col-4">
            <a href="{{ route('detail.bencana',[$bencana->id]) }}"><img src="{{ asset('img/bencana/'.$bencana->gambar)  }}" style="height:230px;width:330px;" alt="" class="img-fluid shadow p-1 mb-2 bg-white rounded"></a>
            <a href="{{ route('detail.bencana',[$bencana->id]) }}"> <h6 class="text-center">{{$bencana->nama_bencana}}</h6></a>
          </div>
          @endforeach()
       
        </div>
<!--
        <div class="row">
        <div class="col-md">
          <a href="#"><img src="img/7.jpg" alt="" class="img-fluid shadow p-1 mb-2 bg-white rounded"></a>
          <a href="#"> <h6 class="text-center">Gunung Meletus</h6></a>
        </div>
        <div class="col-md">
          <a href="#">
            <img src="img/6.jpg" class="img-fluid shadow p-1 mb-2 bg-white rounded" alt=""></a>
          <a href="#"><h6 class="text-center">Tornado</h6></a>
        </div>
        <div class="col-md">
          <a href="#"><img src="img/8.jpg" class="img-fluid shadow p-1 mb-2 bg-white rounded" alt=""></a>
          <a href="#"> <h6 class="text-center">Banjir</h6></a>
        </div>
      </div> -->
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
    <!-- akhir detail bencana -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javaScript" src="js/bootstrap.min.js" ></script>
  </body>
</html>
