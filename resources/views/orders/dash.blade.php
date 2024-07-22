@extends('layouts/contentNavbarLayout')

@section('title', 'Menu')

@section('content')

    <style>
        .card {
            margin: 0%;
        }
    </style>

    <body>
        <div class="container flex md:flex-row columns-12 justify-center mx-auto" style="display: flex">

            <div class="card mx-3 px-5 py-5">
                <div class="card-body text-nowrap content-center px-5">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap pt-4 px-4">Orders 🎉</h5> <br>
                    {{-- <p class="mb-2">Best seller of the month</p> --}}

                    <h4 class="text-primary text-center">{{ $count }} 🚀</h4>
                    {{-- <p class="mb-2">78% of target 🚀</p> --}}
                    {{-- <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light">View Sales</a> --}}
                </div>
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/trophy.png"
                    class="position-absolute bottom-0 end-0 me-4" width="50" alt="view sales">
            </div>
            <div class="card mx-3 px-5 py-5">
                <div class="card-body text-nowrap px-5 ">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap pt-4">Customers 🎉</h5><br>
                    {{-- <p class="mb-2">Best seller of the month</p> --}}

                    <h4 class="text-primary text-center">{{ $param }} 🚀</h4>
                    {{-- <p class="mb-2">78% of target 🚀</p> --}}
                    {{-- <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light">View Sales</a> --}}
                </div>
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/trophy.png"
                    class="position-absolute bottom-0 end-0 me-4 " width="50" alt="view sales">
            </div>
            <div class="card mx-3 px-5 py-5">
                <div class="card-body text-nowrap px-5">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap pt-4">products 🎉</h5><br>
                    {{-- <p class="mb-2">Best seller of the month</p> --}}

                    <h4 class="text-primary mb-0 text-center">{{ $prod }} 🚀</h4>
                    {{-- <p class="mb-2">78% of target </p> --}}
                    {{-- <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light">View Sales</a> --}}
                </div>
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/trophy.png"
                    class="position-absolute bottom-0 end-0 me-4 " width="50" alt="view sales">
            </div>
        </div>
        <div class="container mt-4 mx-auto">
                    <br>
                    <div id="container" style="width:100%; height:300px;"></div>
        </div>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> --}}
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $.ajax({
                    url: 'http://127.0.0.1:8000/chart',
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
                        const chart = Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Overall Data'
                            },
                            xAxis: {
                                categories: data.categories
                            },
                            yAxis: {
                                title: {
                                    text: 'Count'
                                }
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.3,
                                    groupPadding: 0.2,
                                    borderWidth: 0,
                                    maxPointWidth: 50
                                }
                            },
                            series: data.series
                        });
                    },
                    error: function(error) {
                        console.log('Error fetching data', error);
                    }
                });
            });







            // document.addEventListener('DOMContentLoaded', function() {

            //     $(function ready() {
            //         $.ajax({
            //             url: "http://127.0.0.1:8000/chart",
            //             type: 'GET',
            //             async: true,
            //             dataType: "json",

            //             success: function(point1) {
            //                 options.series = point1;
            //                 alert(point1);
            //                 const chart = Highcharts.chart('container', {
            //                     chart: {
            //                         type: 'column'
            //                     },
            //                     title: {
            //                         text: 'Fruit Consumption'
            //                     },
            //                     xAxis: {
            //                         categories: ['Apples', 'Bananas', 'Oranges']
            //                     },
            //                     yAxis: {
            //                         title: {
            //                             text: 'Fruit eaten'
            //                         }
            //                     },
            //                     series: point1;
            //                 });

            //             }
            //         });
            //     });
            // });

            // document.addEventListener('DOMContentLoaded', function() {
            //     var ctx = document.getElementById('myChart').getContext('2d');
            //     var myChart = new Chart(ctx, {
            //         type: 'bar',
            //         data: {
            //             labels: [],
            //             datasets: [{
            //                 label: 'Data Count',
            //                 data: [],
            //                 backgroundColor: [
            //                     'rgba(255, 99, 132, 0.2)',
            //                     'rgba(54, 162, 235, 0.2)',
            //                     'rgba(255, 206, 86, 0.2)',
            //                 ],
            //                 borderColor: [
            //                     'rgba(255, 99, 132, 1)',
            //                     'rgba(54, 162, 235, 1)',
            //                     'rgba(255, 206, 86, 1)',
            //                 ],
            //                 borderWidth: 1
            //             }]
            //         },
            //         options: {
            //             scales: {
            //                 yAxes: [{
            //                     ticks: {
            //                         beginAtZero: true,
            //                         stepSize: 100
            //                     }
            //                 }]
            //             }
            //         }
            //     });

            //     function updateChart() {
            //         $.ajax({
            //             url: "http://127.0.0.1:8000/chart",
            //             type: 'GET',
            //             dataType: 'json',
            //             success: function(data) {
            //                 alert("DATtA");
            //                 console.log("data ;-", data)
            //                 myChart.data.labels = data.labels;
            //                 myChart.data.datasets[0].data = data.counts;
            //                 myChart.update();
            //             },
            //             error: function(data) {
            //                 console.log(data);
            //             }
            //         });
            //     }

            //     updateChart();

            //     setInterval(updateChart, 60000);
            // });
        </script>
    </body>

    </html>

@endsection
