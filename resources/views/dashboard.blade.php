<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-[20px] basis-1/2">
                <div class="p-[15px] text-gray-900 dark:text-gray-100">
                    <h2 class="text-[18px] mb-3">امار کدنویسی شما (30 روز گذشته) :</h2>
                    <div id="chart-development-activity" class="rounded-[10px] overflow-hidden"></div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-[20px] basis-1/2">
                <div class="p-[15px] text-gray-900 dark:text-gray-100">
                    <h2 class="text-[18px] mb-3">امار بازدید های شما (30 روز گذشته) :</h2>
                    <div id="chart-visit-activity" class="rounded-[10px] overflow-hidden"></div>
                </div>
            </div>
        </div>
    </div>

    @section("script")
        <script src="{{ asset("assets/js/apexcharts.js") }}"></script>
        <script>
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 192,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
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
                    data: @json($code_status_history["totals"])
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
                labels: @json($code_status_history["dates"]),
                colors: ["#FF5C00"],
                legend: {
                    show: false,
                },
                point: {
                    show: false
                },
            })).render();
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-visit-activity'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 192,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
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
                    data: @json($code_codes_visits["totals"])
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
                labels: @json($code_codes_visits["dates"]),
                colors: ["#FF5C00"],
                legend: {
                    show: false,
                },
                point: {
                    show: false
                },
            })).render();
        </script>
    @endsection
</x-app-layout>
