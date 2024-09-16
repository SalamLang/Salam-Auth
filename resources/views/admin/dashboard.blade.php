<x-app-layout admin="true">
    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
            <div class="card basis-1/4 border-0 shadow !rounded-[15px] !overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="subheader fs-4">تعداد کاربران</div>
                        <h3 class="m-0">45</h3>
                    </div>
                </div>
                <div id="small_chart_1" class="chart-sm"></div>
            </div>
        </div>

    </div>
    @section("style")
        @vite(["resources/sass/app.scss"])
    @endsection
    @section("script")
        <script src="{{ asset("assets/js/apexcharts.js") }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                window.ApexCharts && (new ApexCharts(document.getElementById('small_chart_1'), {
                    chart: {
                        type: "area",
                        fontFamily: 'inherit',
                        height: 70.0,
                        sparkline: {
                            enabled: true
                        },
                        animations: {
                            enabled: true
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        opacity: .16,
                        type: 'solid'
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                        name: "تعداد",
                        data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
                    }],
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false
                        },
                        axisBorder: {
                            show: false,
                        },
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            padding: 4
                        },
                    },
                    labels: [
                        '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
                    ],
                    colors: ["#FF5C00"],
                    legend: {
                        show: false,
                    },
                })).render();
            });
        </script>
    @endsection
</x-app-layout>
