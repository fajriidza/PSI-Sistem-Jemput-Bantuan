<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/editProfil.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">

    <title>Edit Profil</title>
  </head>
     <body>
      <!-- navbar -->
      @include('User.navbar')
    <!-- akhir navbar -->

    <div class="bg">
    <div class="overlay">
    <div class="row">
      <div class="col-sm-8 offset-sm-2 form ">
          <form method="POST" action="{{ route('profil.update',[$donatur->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
            <h2 class="text-center">Edit Profil</h2>
              <div class="row">
                <div class="col-sm-6">
                  <label for="">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_donatur" value="{{$donatur->name}}" placeholder="Nama Lengkap Anda">
                </div>
                <div class="col-sm-6">
                  <label for="">Provinsi</label>
                   <input type="text" name="" value="{{$provinces[0]->name}}" class="form-control" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                      <label for="">Email Anda</label>
                      <input type="text" class="form-control" name="email_donatur" value="{{$donatur->email}}" placeholder="Email Anda">
                    </div>
                <div class="col-sm-6">
                  <label>Kabupaten</label>
                  {!! Form::select('id_regencies',[''=>$donatur->get_lokasi_user->regencies['name']]+$kabupaten,null,['class'=>'form-control']) !!}
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 ">
                  <label for="" class="inputAlamat">Alamat Lengkap</label>
                  <textarea name="alamat_donatur" style="resize: none" class="form-control"  placeholder="Alamat Lengkap Anda">{{$donatur->alamat}}</textarea>
                </div>
                <div class="col-sm-6">
                  <label>Pilih Kecamatan</label>
                  {!! Form::select('id_districts',[''=>$donatur->get_lokasi_user['name']]+$kecamatan,$donatur->get_lokasi_user['id'],['class'=>'form-control','required']) !!}
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="">Nomor Telepon</label>
                        <input type="number" class="form-control" name="no_hp" value="{{$donatur->no_hp}}" placeholder="Nomor Telepon Anda">
                        <input type="hidden" name="donatur_id" value="{{$donatur->id}}">
                      </div>
                      <div class="col-sm-6">
                        
                      </div>
                    </div>
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-sm-4 offset-sm-4 btnSubmit">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
                </div>
                  @if (session('alert'))
                      <div class="alert alert-danger">
                          {{ session('alert') }}
                      </div>
                  @endif
              </div>
              
            </form>
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
  </body>
</html>
