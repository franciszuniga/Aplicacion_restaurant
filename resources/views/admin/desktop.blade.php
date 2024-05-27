@extends('layouts.config')
@section('content')
    @include('admin.header')

    <div id="layoutSidenav">
        @include('admin.sidebar')

        <div id="layoutSidenav_content">
            <div>
                <canvas id="canvas" height="150" width="500"></canvas>
            </div>

            <hr>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright © Your Website 2022</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @push('other-scripts')
        <script>
            var year = <?php echo $year; ?>;
            var product = <?php echo $product; ?>;
            var barChartData = {
                labels: year,
                datasets: [{
                    label: 'Ventas',
                    backgroundColor: "pink",
                    data: product
                }]
            };

            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        elements: {
                            rectangle: {
                                borderWidth: 2,
                                borderColor: '#c1c1c1',
                                borderSkipped: 'bottom'
                            }
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Yearly product Joined'
                        }
                    }
                });
            };
        </script>
    @endpush
@endsection
