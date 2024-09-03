{{--<html>--}}
{{--<head>--}}
{{--    <title>Pagination</title>--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
{{--    <style>--}}
{{--        table {--}}
{{--            border-collapse: collapse;--}}
{{--        }--}}

{{--        .inline {--}}
{{--            display: inline-block;--}}
{{--            float: right;--}}
{{--            margin: 20px 0px;--}}
{{--        }--}}

{{--        input, button {--}}
{{--            height: 34px;--}}
{{--        }--}}

{{--        .pagination {--}}
{{--            display: inline-block;--}}
{{--        }--}}

{{--        .pagination a {--}}
{{--            font-weight: bold;--}}
{{--            font-size: 18px;--}}
{{--            color: black;--}}
{{--            float: left;--}}
{{--            padding: 8px 16px;--}}
{{--            text-decoration: none;--}}
{{--            border: 1px solid black;--}}
{{--        }--}}

{{--        .pagination a.active {--}}
{{--            background-color: #ff002d;--}}
{{--        }--}}

{{--        .pagination a:hover:not(.active) {--}}
{{--            background-color: skyblue;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<center>--}}
{{--    <?php--}}
{{--    $db = Flight::db();--}}
{{--    $per_page_record = 4;--}}
{{--    if (isset($_GET["page"])) {--}}
{{--        $page = $_GET["page"];--}}
{{--    } else {--}}
{{--        $page = 1;--}}
{{--    }--}}
{{--    $start_from = ($page - 1) * $per_page_record;--}}
{{--    $stmt = $db->prepare("SELECT * FROM users LIMIT $start_from, $per_page_record");--}}
{{--    $stmt->execute();--}}
{{--    $result = $stmt->fetchAll();--}}
{{--    ?>--}}
{{--    <div class="container">--}}
{{--        <br>--}}
{{--        <div>--}}
{{--            <h1>Pagination Simple Example</h1>--}}
{{--            <p>This page demonstrates the basic--}}
{{--                Pagination using PHP and MySQL.--}}
{{--            </p>--}}
{{--            <table class="table table-striped table-condensed table-bordered">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th width="10%">ID</th>--}}
{{--                    <th>Name</th>--}}
{{--                    <th>College</th>--}}
{{--                    <th>Score</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($result as $res)--}}
{{--                    <tr>--}}
{{--                        <td width="10%">{{ $res["id"] }}</td>--}}
{{--                        <td>{{ $res["name"] }}</td>--}}
{{--                        <td>{{ $res["email"] }}</td>--}}
{{--                        <td>{{ $res["password"] }}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <div class="pagination">--}}
{{--                <?php--}}
{{--                $stmt = $db->prepare("SELECT COUNT(*) as count FROM users");--}}
{{--                $stmt->execute();--}}
{{--                $total_records = $stmt->fetchAll();--}}
{{--                $total_pages = ceil($total_records[0]["count"] / $per_page_record);--}}
{{--                $pagLink = "";--}}
{{--                if ($page >= 2) {--}}
{{--                    echo "<a href='?page=" . ($page - 1) . "'>  Prev </a>";--}}
{{--                }--}}
{{--                for ($i = 1; $i <= $total_pages; $i++) {--}}
{{--                    if ($i == $page) {--}}
{{--                        $pagLink .= "<a class = 'active' href='?page=" . $i . "'>" . $i . " </a>";--}}
{{--                    } else {--}}
{{--                        $pagLink .= "<a href='?page=" . $i . "'>" . $i . " </a>";--}}
{{--                    }--}}
{{--                };--}}
{{--                echo $pagLink;--}}
{{--                if ($page < $total_pages) {--}}
{{--                    echo "<a href='?page=" . ($page + 1) . "'>  Next </a>";--}}
{{--                }--}}
{{--                ?>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</center>--}}
{{--</body>--}}
{{--</html>--}}


















