<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Homepage Donate</title>
  </head>
  <body>
  @include('User.navbar')

    <!-- jumbotron -->
    <section id="beranda" class="beranda">
    <div class="jumbotron jumbotron-fluid">
      <div class="overlay">
            <!-- <img src="img/akame.png" class="" width="300px"> -->
            <h1 >Sistem Jemput Bantuan Bencana</h1>
            <p >"Untuk mempermudah proses pengumpulan bantuan bencana dari para Donatur kepada LSM <br> dengan media penjemputan oleh Petugas ke alamat masing - masing Donatur.</p>
    </div>
  </div>
  </section>
    <!-- akhir jumbotron -->

    <!-- Donasi -->
    <section class="donasi">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-sm-6">
              <img src="img/5.jpg" class="img-fluid img-thumbnail shadow p-3 mb-5 bg-white rounded" alt="">
            </div>
            <div class="col-sm-6">
                <h1 class="text-center">DONASI BENCANA</h1>
                <p class="text-center text-muted">Anda bisa melakukan donasi di web kami. Baik dalam bentuk Sandang, Pangan, Papan, Obat-Obatan dan sebagainya. Dengan Donate anda bisa lebih mudah melakukan donasi dengan mudah pada orang-orang yang sedang membutuhkan. DONATE menggunakan sistem jemput bantuan agar para donatur tidak harus mengirimkan bantuan ke tempat pengungsian langsung melainkan hanya duduk dan menunggu petugas kami menjemput ke alamat Anda.</p>
                <br>
                <div class="col-4 offset-4">
                  <a href="/donatur/donasi" class="btn btn-primary btn-block">Donasi Sekarang</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- bencana terkini -->
    <div class="container bencana">
        <h1 class="text-center">BENCANA TERKINI</h1>
        <hr>
        <div class="card-deck">
           @foreach($bencana as $bencana)
            @if ($loop->index < 3)
           <div class="card hosha">
             
            <img class="card-img-top" src="{{ asset('img/bencana/'.$bencana->gambar)  }}" style="height:250px;width:350px" alt="Card image cap" >
            <div class="card-body bterkini">
              <a href="{{ route('detail.bencana',[$bencana->id]) }}">
                <h5 class="card-title">{{$bencana->nama_bencana}}</h5>
                <p>{{str_limit($bencana->deskripsi_bencana,150)}}.</p>
              </a>
            </div>
            <div class="card-footer">
              <small class="text-muted"></small>
            </div>
           
          </div>
            @endif
          @endforeach()

        </div>
        <div class="col-sm-4 offset-sm-4 bencanaLainnya">
          <a href="/bencana" class="btn btn-primary btn-block">Bencana Lainnya</a>

        </div>
    </div>
    <!-- akhir bencana -->

    <!-- review -->
    <div class=" review">
            <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>REVIEW DONATUR</h1>
                    <p class="ju">Kami percaya akan hadir peradaban dunia yang lebih baik. Semua permasalahan kemanusiaan dapat diselesaikan dengan membangun kedermawanan dan kerelawanan global. Insya Allah.</p>
                    <p>“DONATE” adalah sarana bagi kita di mana pun berada, untuk membuktikan kepedulian sebagai manusia. Bersama kita berkolaborasi dalam berbagai bentuk kepedulian sebagai solusi isu-isu kemanusiaan baik di Indonesia dan penjuru dunia.</p>
                </div>
                <div class="col-sm-6 do">
                    <img src="img/9.jpg" class="img-fluid shadow p-1 mb-2 bg-white rounded">
                </div>
            </div>
        </div>
    </div>
    <!-- akhir review -->

    <!-- statistik -->
 <section>
      <div class="statistik">
        <div class="row">
          <div class="col-12">
            <h1 class="text-center">STATISTIK DONATE</h1>
            <div class="container">
              <div class="row">
              <div class="col-sm-4 ">
                <div class="statistik1">
                  <h6 class="text-center"><i class="fas fa-users fa-2x "></i> <br> {{$totalDonatur}} </h6>
                  <p class="text-center ">Total Donatur</p>
                </div>
              </div>
              <div class="col-sm-4 ">
                <div class="statistik2">
                  <h6 class="text-center">  <i class="fas fa-cube fa-2x"></i> <br>{{$total}}</h6>
                  <p class="text-center">Total Donasi Diterima</p>
                </div>
              </div>
              <div class="col-sm-4 ">
                <div class="statistik3">
                  <h6 class="text-center">
                    <i class="fas fa-car fa-2x"></i> <br> {{$totalTerdistribusi}}</h6>
                  <p class="text-center">Bantuan Terdistribusi</p>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   <!-- tentang kami -->
      <!-- Team -->
      <section id="team" class="pb-5">
      <div class="container">
          <h5 class="section-title h1">TIM KAMI</h5>
          <hr>
          <div class="row">
              <!-- Team member -->
              <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                      <div class="mainflip">
                          <div class="frontside">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <p><img class=" img-fluid" src="img/23.jpg" alt="card image"></p>
                                      <h4 class="card-title">M. Sulthon Alif</h4>
                                      <p class="card-text">"Yaranakutemo ii koto no na yaranai, Yaranakereba ikenai koto nara temijikani".</p>
                                      <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="backside">
                              <div class="card">
                                  <div class="card-body text-center mt-4">
                                      <h4 class="card-title">M. Sulthon Alif</h4>
                                      <p class="card-text">Halo, nama saya M. Sulthon Alif, jurusan Teknik Informatika 2017, dalam pengembangan web ini saya berperan sebagai Front-End. Untuk lebih jelasnya bisa klik salah satu icon dibawah ini.</p>
                                      <ul class="list-inline">
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-facebook"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-twitter"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="https://www.instagram.com/ms_alif/">
                                                  <i class="fab fa-instagram"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-google"></i>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ./Team member -->
              <!-- Team member -->
              <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                      <div class="mainflip">
                          <div class="frontside">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <p><img class=" img-fluid" src="img/22.jpg" alt="card image"></p>
                                      <h4 class="card-title">Ichsan A. Juliansyah</h4>
                                      <p class="card-text">"Sesungguhnya Allah dekat dengan orang-orang yang sabar".</p>
                                      <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="backside">
                              <div class="card">
                                  <div class="card-body text-center mt-4">
                                      <h4 class="card-title">Ichsan A. Juliansyah</h4>
                                      <p class="card-text">Halo, nama saya Ichsan A. Juliansyah, jurusan Teknik Informatika 2017, dalam pengembangan web ini saya berperan sebagai Front-End. Untuk lebih jelasnya bisa klik salah satu icon dibawah ini.</p>
                                      <ul class="list-inline">
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-facebook"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-twitter"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="https://www.instagram.com/ichanrsyd/">
                                                  <i class="fab fa-instagram"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-google"></i>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ./Team member -->
              <!-- Team member -->
              <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                      <div class="mainflip">
                          <div class="frontside">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <p><img class=" img-fluid" src="img/21.jpg" alt="card image"></p>
                                      <h4 class="card-title">Fajri Idza Inayah</h4>
                                      <p class="card-text">"Jika orang lain bisa, kenapa harus saya ?"</p>
                                      <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="backside">
                              <div class="card">
                                  <div class="card-body text-center mt-4">
                                      <h4 class="card-title">Fajri Idza Inayah</h4>
                                      <p class="card-text">Halo, nama saya Fajri Idza Inayah, jurusan Teknik Informatika 2017, dalam pengembangan web ini saya berperan sebagai Back-End. Untuk lebih jelasnya bisa klik salah satu icon dibawah ini.</p>
                                      <ul class="list-inline">
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-facebook"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-twitter"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="https://www.instagram.com/fajriidza/">
                                                  <i class="fab fa-instagram"></i>
                                              </a>
                                          </li>
                                          <li class="list-inline-item">
                                              <a class="social-icon text-xs-center" target="_blank" href="#">
                                                  <i class="fab fa-google"></i>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ./Team member -->

          </div>
      </div>
  </section>
  <!-- Team -->


    <!-- footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
             <p>&copy; Copyright 2018 | Built with by <span>De Nun </span><br>Jalan Kaliurang Km. 14,5, Yogyakarta, Krawitan, Umbulmartani, Ngemplak, Kabupaten Sleman, <br>Daerah Istimewa Yogyakarta 55584 </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js  "></script>
    <script type="text/javascript" src="js/welcome.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js  "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  </body>
</html>
