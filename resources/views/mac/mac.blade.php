@include('components.layout')
<div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="card shadow p-3 mb-5 bg-white rounded">
        <p>MAC: {{$mac}}</p>
            <p>Contract: {{$contract}}</p>
        </div>
    </div>
    <div class="col-sm-4">
        <form action="/mac/date" method="POST">
            <input type="text" name="date" id="date" class="form-control">
            <input type="text" name="mac" id="mac" hidden value="{{$mac}}">
            <input type="text" name="contract" id="contract" hidden value="{{$contract}}">
            @csrf
            <button type="submit" class="btn-secondary">Go</button>
            <p>Date range: {{$startdate ?? 'Today'}} - {{$enddate ?? 'Today'}}</p>
        </form>
    </div>

    <div class="col-sm-4">
        <form class="form-group" action="/dashboard" method="GET">
        <button type="submit" class="btn-secondary">Reset</button>
        </form>
    </div>
</div>
</div>

<div class="container">

<div class="row">

<div class="col-sm-6">
    <div class="card shadow p-3 mb-5 bg-white rounded">
<canvas id="bitrateChart"></canvas>
    <p>Bitrate Mb/s</p>
    </div>
</div>

    <div class="col-sm-6">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <canvas id="rssChart"></canvas>
            <p>RSS</p>
        </div>

    </div>
</div>
    <div class="row">

        <div class="col-sm-6">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <canvas id="clientsChart"></canvas>
                <p>Clients</p>
            </div>
        </div>

    </div>
</div>

<!-- START OF CHARTS -->

<!-- BITRATE CHART -->
<script>
    var ctx = document.getElementById('bitrateChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [ @foreach($time as $t) '{{$t}}', @endforeach ],
            datasets: [{
                label: 'Max',
                data: [ @foreach($maxbitrate as $mbr) '{{$mbr}}', @endforeach ] ,
                borderColor: 'rgb(95, 241, 124)',
                backgroundColor: 'rgb(255, 255, 255)',
                fill: false,
                borderWidth: 1,

            },
                {
                    label: 'Min',
                    data: [ @foreach($minbitrate as $minbr) '{{$minbr}}', @endforeach ],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgb(255, 255, 255)',
                    fill: false,
                    borderWidth: 1,
                },
                {
                    label: 'Avg',
                    data: [ @foreach($avgbitrate as $avb) '{{$avb}}', @endforeach ],
                    borderColor: 'rgb(244, 241, 71)',
                    backgroundColor: 'rgb(255, 255, 255)',
                    fill: false,
                    borderWidth: 1,
                },

            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<!-- RSS CHART -->

<script>
    var ctx = document.getElementById('rssChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [ @foreach($time as $t) '{{$t}}', @endforeach ],
            datasets: [{
                label: 'Max',
                data: [ @foreach($maxrss as $max) '{{$max}}', @endforeach ] ,
                borderColor: 'rgb(95, 241, 124)',
                backgroundColor: 'rgb(255, 255, 255)',
                fill: false,
                borderWidth: 1,

            },
                {
                    label: 'Min',
                    data: [ @foreach($minrss as $min) '{{$min}}', @endforeach ],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgb(255, 255, 255)',
                    fill: false,
                    borderWidth: 1,
                },
                {
                    label: 'Avg',
                    data: [ @foreach($avgrss as $avg) '{{$avg}}', @endforeach ],
                    borderColor: 'rgb(244, 241, 71)',
                    backgroundColor: 'rgb(255, 255, 255)',
                    fill: false,
                    borderWidth: 1,
                },

            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<!-- CLIENTS CHART -->

<script>
    var ctx = document.getElementById('clientsChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [ @foreach($time as $t) '{{$t}}', @endforeach ],
            datasets: [{
                label: 'Max',
                data: [ @foreach($maxclients as $max) '{{$max}}', @endforeach ] ,
                borderColor: 'rgb(95, 241, 124)',
                backgroundColor: 'rgb(255, 255, 255)',
                fill: false,
                borderWidth: 1,

            },
                {
                    label: 'Min',
                    data: [ @foreach($minclients as $min) '{{$min}}', @endforeach ],
                    borderColor: 'rgb(71, 74, 244)',
                    backgroundColor: 'rgb(71, 74, 244)',
                    fill: true,
                    borderWidth: 1,
                },
                {
                    label: 'Avg',
                    data: [ @foreach($avgclients as $avg) '{{$avg}}', @endforeach ],
                    borderColor: 'rgb(244, 241, 71)',
                    backgroundColor: 'rgb(255, 255, 255)',
                    fill: false,
                    borderWidth: 1,
                },

            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


<!-- Daterangepicker -->
<script>
    $('input[name="date"]').daterangepicker();
    $('#date').daterangepicker({
        "startDate": "01-01-2020",
        "endDate": "06-02-2020",
        locale:{
            format:'DD-MM-YYYY'
        },
    });
</script>
