<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

 <script>
  

 Highcharts.chart('chart_kecamatan', {
          chart: {
            type: 'column'
          },
          title: {
            text: 'Total Donasi berdasarkan Kategori {{$lokasi_kabupaten->name}}'
          },
          subtitle: {
            text: ' '
          },
          xAxis: {
            type: 'category'
          },
          yAxis: {
            title: {
              text: 'Total Donasi'
            }

          },
          legend: {
            enabled: false
          },
          plotOptions: {
            series: {
              borderWidth: 0,
              dataLabels: {
                enabled: true,
                format: '{point.y}'
              }
            }
          },

          tooltip: {
            headerFormat: '<span style="font-size:11px"> Jumlah Penjemputan </span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> <br/>'
          },

         series: [{
         name: "Browsers",
              colorByPoint: true,
              <?php $i=0; ?>
        data: [@foreach($nama as $nama){
            name: '{!!$nama!!}',
            y: {!!$total[$i]!!}
            <?php $i++; ?>
        }@if($loop->remaining != 0) , @endif @endforeach]
    }]
        });
</script>