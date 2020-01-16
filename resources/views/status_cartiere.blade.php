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
    <script type="application/javascript">

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        $(document).ready(function () {

            const path = "{{ route('fetchChartData') }}";
            let chartDataset;

            function getChartDataSet(ajaxurl) {
                return ($.ajax({
                    url: ajaxurl,
                    type: 'GET',
                    crossDomain: true,
                    async: false,
                    dataType: 'json',
                    success: function (result) {
                        return result;
                    },
                    error: function () {
                        alert('Request Failed!');
                    }
                }));
            };

            const responseData = JSON.parse(getChartDataSet(path).responseText);
            chartDataset = [];

            chartDataset = $.map(responseData.data, function (value, index) {
                return (
                    {
                        label: index,
                        backgroundColor: getRandomColor(),
                        borderColor: "black",
                        borderWidth: 1,
                        data: value
                    }
                );
            });

            const barChartData = {
                labels: responseData.labels,
                datasets: chartDataset,
            };

            const chartOptions = {
                responsive: true,
                legend: {
                    position: "top"
                },
                title: {
                    display: true,
                    text: "Chart.js Bar Chart"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

            window.onload = function () {
                const ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: "bar",
                    data: barChartData,
                    options: chartOptions
                });
            };


            // {
            //     "labels":[
            //     "Baciu",
            //     "Buna Ziua",
            //     "Manastur",
            //     "Marasti",
            //     "Zorilor"
            // ],
            //     "data":{
            //     "Baciu":{
            //         "bulevarde":2,
            //             "piete":3,
            //             "strzi":5
            //     },
            //     "Buna Ziua":{
            //         "bulevarde":4,
            //             "piete":4,
            //             "strzi":2
            //     },
            //     "Manastur":{
            //         "bulevarde":4,
            //             "piete":4,
            //             "strzi":2
            //     },
            //     "Marasti":{
            //         "bulevarde":6,
            //             "piete":1,
            //             "strzi":3
            //     },
            //     "Zorilor":{
            //         "bulevarde":1,
            //             "piete":4,
            //             "strzi":5
            //     }
            // }
            // }

        })
    </script>
</div>
</body>
</html>
