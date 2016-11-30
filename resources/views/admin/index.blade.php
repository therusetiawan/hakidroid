@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    <h3>Beranda</h3>
  </div>
  <div class="content body">
    <div class="row">
      <div class="col-sm-4">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>10</h3>
            <p>Permintaan HAKI Baru</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <a href="#" class="small-box-footer">
             Info Selanjutnya <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>30</h3>
            <p>HAKI telah terivikasi</p>
          </div>
          <div class="icon">
            <i class="fa fa-check"></i>
          </div>
          <a href="#" class="small-box-footer">
             Info Selanjutnya <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>20</h3>
            <p>Konsultan HAKI</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="#" class="small-box-footer">
            Info Selanjutnya <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

    {{-- Box Statistik --}}
    <div class="row">
      <div class="col-sm-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-paper-plane"></i> Pengajuan Usulan HAKI Baru</h3>
          </div>
            <ul class="nav nav-stacked">
              <li><a href="#">Scantour <span class="pull-right badge bg-orange"><i class="fa fa-close"></i> Belum terverifikasi</span></a></li>
              <li><a href="#">GOku: GO <span class="pull-right badge bg-orange"><i class="fa fa-close"></i> Belum terverifikasi</span></a></li>
              <li><a href="#">Math Eater <span class="pull-right badge bg-orange"><i class="fa fa-close"></i> Belum terverifikasi</span></a></li>
            </ul>
          <div class="box-footer">
            <a href="#" class="btn btn-primary pull-right">Lihat Semua</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-pie-chart"></i> Statistik Perbandingan Pengajuan</h3>
          </div>
          <div class="box-body">
            <canvas id="pieChart" style="height:250px"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{asset('/admin/plugins/chartjs/Chart.min.js')}}" charset="utf-8"></script>
  <script type="text/javascript">
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: 5,
        color: "#f56954",
        highlight: "#f56954",
        label: "Desain Industri"
      },
      {
        value: 10,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Hak Paten"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      // legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Pie(PieData, pieOptions);

  </script>
@endsection
