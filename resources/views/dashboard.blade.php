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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-[20px]">
                <div class="p-[15px] text-gray-900 dark:text-gray-100">
                    <h2 class="text-[18px] mb-3">اخرین کد های شما :</h2>
                    <table id="myTable" class="display code_dataTable rounded-[10px] overflow-hidden">
                        <thead>
                        <tr>
                            <th class="text-[#276EF6]">ایدی</th>
                            <th class="text-[#276EF6]">عنوان</th>
                            <th class="text-[#276EF6]">کد</th>
                            <th class="text-[#276EF6]">ایجاد شده در</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($last_codes as $last_code)
                            <tr>
                                <td class="text-[#FF5C00]">{{ $last_code["id"] }}</td>
                                <td>{{ mb_substr($last_code["title"], 0, 20) . "..." }}</td>
                                <td>{{ mb_substr($last_code["code"], 0, 20) . "..." }}</td>
                                <td>{{ $last_code["created_at"] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section("style")
        <link rel="stylesheet" href="{{ asset("assets/css/dataTables.dataTables.css") }}"/>
    @endsection

    @section("script")
        <script src="{{ asset("assets/js/jquery-3.7.1.js") }}"></script>
        <script src="{{ asset("assets/js/dataTables.js") }}"></script>
        <script src="{{ asset("assets/js/apexcharts.js") }}"></script>
        <script>
            let table = new DataTable('#myTable', {
                paging: false,
                searching: false,
                ordering: false,
                info: false
            });
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
