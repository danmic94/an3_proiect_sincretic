<!DOCTYPE html>
<html>
<head>
    <title>Statistica cartiere</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
</head>
<body>
<div style="margin-top: auto; margin-bottom: auto">
    <canvas id="canvas" style="display: block; width: auto; height: auto;" width="1895" height="947" class="chartjs-render-monitor"></canvas>
</div>
</body>
<script type="application/javascript">

    $(document).ready(function () {
        const path = "{{ route('fetchChartData') }}";
        console.log(path);
        let chartDataset;
        $.get(path, null, function (data) {
            console.log(data);
        });

        window.chartColors = {
            "red": "rgb(255, 99, 132)",
            "green": "rgb(75, 192, 192)",
            "blue": "rgb(54, 162, 235)"
        }
        const barChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Bulevard',
                backgroundColor: window.chartColors.red,
                stack: 'Stack 0',
                data: [
                    11,
                    1,
                    22,
                ]
            }, {
                label: 'Piata',
                backgroundColor: window.chartColors.blue,
                stack: 'Stack 1',
                data: [
                    7,
                    2,
                    22,
                ]
            }, {
                label: 'Strada',
                backgroundColor: window.chartColors.green,
                stack: 'Stack 2',
                data: [
                    -19,
                    3,
                    22,
                ]
            }]

        };
        window.onload = function () {
            const ctx = document.getElementById('canvas').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart - Stacked'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });
        };

    })
</script>
</html>
