@extends("admin.layouts.master")

@section("title","home")

@section("content")
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Posts</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{ $postCount }}</div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg" class="chart-sm"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Posts Visit</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{ $postVisitCount }}</div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg2" class="chart-sm"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Comments</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{ $commentCount }}</div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg3" class="chart-sm"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Categories</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{ $userCount }}</div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg4" class="chart-sm"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Site Visits</h3>
                                    <h3 class="card-title">{{ $visitsCount2 }}</h3>
                                </div>
                                <div id="chart-mentions1" class="chart-lg"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Users History</h3>
                                    <h3 class="card-title">{{ $usersCount2 }}</h3>
                                </div>
                                <div id="chart-mentions2" class="chart-lg"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0 d-flex justify-content-between align-items-center">
                                <div class="card-title">Development activity</div>
                                <div class="card-title">Commits: @json(array_sum(array_map("intval",$commitCount)))</div>
                            </div>
                            <div class="position-relative">
                                <div id="chart-development-activity"></div>
                            </div>
                            <div class="card-table table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Commit</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($commits as $commit)
                                            <tr>
                                                <td class="w-1">
                                                    <span class="avatar avatar-sm" title="{{ $commit["committer"]["login"] }}" style="background-image: url({{ $commit["committer"]["avatar_url"] }})"></span>
                                                </td>
                                                <td class="td-truncate">
                                                    <div class="text-truncate">{{ $commit["commit"]["message"] }}</div>
                                                </td>
                                                <td class="text-nowrap text-secondary">{{ \Carbon\Carbon::createFromDate($commit["commit"]["committer"]["date"]) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
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
                    name: "Commits",
                    data: @json($commitCount)
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
                labels: @json($commitData),
                colors: [tabler.getColor("primary")],
                legend: {
                    show: false,
                },
                point: {
                    show: false
                },
            })).render();
        });
        // @formatter:on
    </script>
@endsection
