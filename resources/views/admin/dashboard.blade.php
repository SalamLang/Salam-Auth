<x-app-layout admin="true">
    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
            <div class="card basis-1/4 border-0 shadow !rounded-[15px] !overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="subheader fs-4">تعداد کاربران</div>
                        <h3 class="m-0">{{ array_sum($users_history["totals"]) }}</h3>
                    </div>
                </div>
                <div id="small_chart_1" class="chart-sm"></div>
            </div>
            <div class="card basis-1/4 border-0 shadow !rounded-[15px] !overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="subheader fs-4">تعداد کد ها</div>
                        <h3 class="m-0">{{ array_sum($codes_history["totals"]) }}</h3>
                    </div>
                </div>
                <div id="small_chart_2" class="chart-sm"></div>
            </div>
            <div class="card basis-1/4 border-0 shadow !rounded-[15px] !overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="subheader fs-4">تعداد بازدید از کد ها</div>
                        <h3 class="m-0">{{ array_sum($codes_visits_history["totals"]) }}</h3>
                    </div>
                </div>
                <div id="small_chart_3" class="chart-sm"></div>
            </div>
            <div class="card basis-1/4 border-0 shadow !rounded-[15px] !overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="subheader fs-4">تعداد ایمیل های ارسال شده</div>
                        <h3 class="m-0">{{ array_sum($emails_history["totals"]) }}</h3>
                    </div>
                </div>
                <div id="small_chart_4" class="chart-sm"></div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4 mt-4">
            <div class="basis-full">
                <h2>پر بازدید ترین کد ها</h2>
                <div class="card" style="height: 28rem">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y">
                            @foreach($best_code_results as $best_code_result)
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">{{ substr( $best_code_result["title"], 0, 2) }}</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>{{ $best_code_result["title"] }}</strong>
                                            </div>
                                            <div class="text-secondary">{{ $best_code_result->fa_created_at() }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
                        data: @json($users_history["totals"])
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
                    labels: @json($users_history["dates"]),
                    colors: ["#FF5C00"],
                    legend: {
                        show: false,
                    },
                })).render();

                window.ApexCharts && (new ApexCharts(document.getElementById('small_chart_2'), {
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
                        data: @json($codes_history["totals"])
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
                    labels: @json($codes_history["dates"]),
                    colors: ["#FF5C00"],
                    legend: {
                        show: false,
                    },
                })).render();

                window.ApexCharts && (new ApexCharts(document.getElementById('small_chart_3'), {
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
                        data: @json($codes_visits_history["totals"])
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
                    labels: @json($codes_visits_history["dates"]),
                    colors: ["#FF5C00"],
                    legend: {
                        show: false,
                    },
                })).render();

                window.ApexCharts && (new ApexCharts(document.getElementById('small_chart_4'), {
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
                        data: @json($emails_history["totals"])
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
                    labels: @json($emails_history["dates"]),
                    colors: ["#FF5C00"],
                    legend: {
                        show: false,
                    },
                })).render();
            });
        </script>
    @endsection
</x-app-layout>
