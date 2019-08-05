<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/daftar.css">
    <link rel="stylesheet" type="text/css" href="/css/navbarlogin.css">

    <title>DONATE</title>
  </head>
     <body>
       <!-- navbar -->
     @include('User.navbar')    
     <!-- akhir navbar -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container-fluid">

      <div class="row">

        <div class="col-sm-8 offset-sm-2 form ">
<form method="POST" action="{{route('daftar','kirim')}}">
{!! csrf_field() !!}
              <h2 class="text-center">Daftar Donatur</h2>
             
                <div class="row">
                  <div class="col-sm-6">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap Anda" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="">Provinsi</label>
                   <input type="text" name="" value="{{$provinces[0]->name}}" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                        <label for="">Email Anda</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda" required>
                      </div>
                  <div class="col-sm-6">
                    <label for="">Kabupaten/Kota</label>
                   {!! Form::select('id_regencies',[''=>'Pilih Kabupaten/Kota']+$regencies,null,['class'=>'form-control','required']) !!}
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <label for="">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan Nomor Telepon Anda" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="">Kecamatan</label>
                    {!! Form::select('id_districts',[''=>'Pilih Kecamatan'],null,['class'=>'form-control','required']) !!}

                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <label for="">Alamat Lengkap</label>
                    <textarea name="alamat"  style="resize:none" class="form-control"  placeholder="Masukkan Alamat Lengkap Anda" required></textarea>
                  </div>
                  <div class="col-sm-6"
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
                    <label for="">Ulangi Password</label>
                    <input type="password" name="repassword" class="form-control" placeholder="Ulangi Password Anda" required>
                    <br>
                    @if (session('alert'))
                  <div class="alert alert-danger">
                      {{ session('alert') }}
                  </div>
              @endif
                  </div>
                </div>

                <br>
                <div class="row">
                  <div class="col-sm-4 offset-sm-4 btnSubmit">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
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

<script src="/js/jquery-3.3.1.min.js"></script>
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
    $("select[name='id_regencies']").change(function(){
        var id_regencies = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {id_regencies:id_regencies, _token:token},
            success: function(data) {
              $("select[name='id_districts'").html('');
              $("select[name='id_districts'").html(data.options);
            }
        });
    });
  </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
    <script type="text/javaScript" src="/js/bootstrap.min.js" ></script>
    <script type="text/javaScript" src="/js/jquery-1.11.2.js"></script>
  
  </body>
</html>
