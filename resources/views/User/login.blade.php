<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">

    <title>DONATE</title>
  </head>
     <body>
      <!-- navbar -->
     @include('User.navbar')
    <!-- akhir navbar -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container-fluid">
<form class="form-signin"  method="POST" action="{{ route('user.login.submit') }}">
                  {{ csrf_field() }}
      <div class="row">

        <div class="col-sm-4 offset-sm-4 form ">
              <h2 class="text-center">Masuk</h2>
              <div class="col-sm-10 offset-sm-1">
                <div class="form-grup">
                  <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Ingat password</label>
                </div>
                <div class="row">
                  <div class="col-sm-10 offset-sm-1 btnSubmit">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                    <a href="/daftar" class="btn btn-lg btn-danger btn-block">Daftar</a>
                    <br>
                    @if (session('alert'))
                      <div class="alert alert-danger">
                          {{ session('alert') }}
                      </div>
                  @endif
                  </div>
                </div>
              </div>

              </div>
            </div>
</form>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
  </body>
</html>
