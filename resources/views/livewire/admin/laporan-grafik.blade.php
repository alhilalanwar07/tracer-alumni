<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan & Grafik</li>
                </ol>
            </nav>
            <h2 class="h4">Laporan & Grafik</h2>
            <p class="mb-0"></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-md-12 mb-2">
            <div class="card card-body border-0 shadow">
                <h2 class="h5 text-center">Grafik Alumni</h2>
                <div id="chartKeteranganAlumni" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 mb-2">
            <div class="card card-body border-0 shadow">
                <h2 class="h5 text-center">Grafik Alumni Berdasarkan Angkatan Wisuda</h2>
                <div id="chartKeteranganAlumni2" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 mb-2">
            <div class="card card-body border-0 shadow">
                <h2 class="h5 text-center">Grafik Alumni Berdasarkan Tahun Masuk</h2>
                <div id="chartKeteranganAlumni3" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 mb-2">
            <div class="card card-body border-0 shadow">
                <h2 class="h5 text-center">Grafik Alumni Berdasarkan Status & Tahun Masuk </h2>
                <div id="chartKeteranganAlumni4" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 mb-2">
            <div class="card border-0 shadow " style="border-top: 3px solid blue !important;">
                <div class="card-body table table-responsive">
                    <h2 class="h5 text-center mb-3 badge bg-info">Kuisioner Belum Bekerja</h2>
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Pertanyaan</th>
                                <th>Menjawab / Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kuisionerData as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-wrap">{{ $data['pertanyaan'] }}</td>
                                <td>
                                    @foreach ($data['jawaban_counts'] as $pilihan => $count)
                                    <span class="badge bg-primary">{{ $count }}</span> {{ $pilihan }} <br>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 mb-2">
            <div class="card border-0 shadow " style="border-top: 3px solid orange !important;">
                <div class="card-body table table-responsive">
                    <h2 class="h5 text-center mb-3 badge bg-warning">Kuisioner Sudah Bekerja</h2>
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Pertanyaan</th>
                                <th>Menjawab / Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sudahBekerja as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-wrap">{{ $data['pertanyaan'] }}</td>
                                <td>
                                    @foreach ($data['jawaban_counts'] as $pilihan => $count)
                                    <span class="badge bg-primary">{{ $count }}</span> {{ $pilihan }} <br>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12 mb-2">
            <div class="card border-0 shadow " style="border-top: 3px solid red !important;">
                <div class="card-body table table-responsive">
                    <h2 class="h5 text-center mb-3 badge bg-danger">Kuisioner Study Lanjut</h2>
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Pertanyaan</th>
                                <th>Menjawab / Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studyLanjut as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-wrap">{{ $data['pertanyaan'] }}</td>
                                <td>
                                    @foreach ($data['jawaban_counts'] as $pilihan => $count)
                                    <span class="badge bg-primary">{{ $count }}</span> {{ $pilihan }} <br>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Grafik pertama
            var data1 = google.visualization.arrayToDataTable(@json($chartData));

            var options1 = {
                curveType: 'function'
                , legend: {
                    position: 'bottom'
                }
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('chartKeteranganAlumni'));
            chart1.draw(data1, options1);

            // Grafik kedua
            var data2 = google.visualization.arrayToDataTable(@json($chartDataAngkatan));

            var options2 = {
                curveType: 'function'
                , legend: {
                    position: 'bottom'
                }
            };

            var chart2 = new google.visualization.BarChart(document.getElementById('chartKeteranganAlumni2'));
            chart2.draw(data2, options2);

            // Grafik ketiga
            var data3 = google.visualization.arrayToDataTable(@json($chartDataTahunMasuk));

            var options3 = {
                curveType: 'function'
                , legend: {
                    position: 'bottom'
                }
            };

            var chart3 = new google.visualization.ColumnChart(document.getElementById('chartKeteranganAlumni3'));
            chart3.draw(data3, options3);

            // Grafik keempat
            var data4 = google.visualization.arrayToDataTable(@json($chart1and2));

            var options4 = {
                curveType: 'function'
                , legend: {
                    position: 'bottom'
                }
                , colors: ['#1D69DB', '#FF4800', '#FF9E37', '#F44336', '#9C27B0']
            };

            var chart4 = new google.visualization.ColumnChart(document.getElementById('chartKeteranganAlumni4'));
            chart4.draw(data4, options4);
        }

    </script>
</div>
