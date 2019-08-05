<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

   {!! Form::select('id_categoris',[''=>'Pilih Kategori']+$categoris,null,['class'=>'form-control','required']) !!}

   {!! Form::select('id_jenis_donasi',[''=>'Pilih Jenis Donasi'],null,['class'=>'form-control','required']) !!}

</body>
 <script src="/js/jquery-3.3.1.min.js"></script>
 <script type="text/javascript">
 	$("select[name='id_categoris']").change(function(){
        var id_categoris = $(this).val();
        $.ajax({
            url: "{{ route('select-ajax-kategori') }}",
            method: 'POST',
            'headers': {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            data: {id_categoris:id_categoris},
            success: function(data) {
              $("select[name='id_jenis_donasi'").html('');
              $("select[name='id_jenis_donasi'").html(data.options);
            }
        });
    });

  </script> 
</html>