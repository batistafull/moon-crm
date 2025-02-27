<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 450px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        .highcharts-description {
            margin: 0.3rem 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Name</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <form class="d-flex me-auto mb-2 mb-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-dark" type="submit">Search</button>
                </form>
                <span class="navbar-text">
                    <a href="http://">Logout</a>
                </span>
            </div>
        </div>
    </nav>
    <ul class="nav justify-content-center p-2 bg-secondary-subtle">
        <li class="nav-item">
            <a class="nav-link" href="#">Leads</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Oportunities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contacts</a>
        </li>
        <li>
            <a class="nav-link" href="#">Accounts</a>
        </li>
    </ul>
    <div class="p-4">
        <div class="row">
            <div class="col-md-4 h-100">
                <div class="card bg-primary-subtle bg-gradient border-0 m-3 h-100">
                    <div class="card-body">
                        <h6 class="card-title">Total balance</h6>
                        <p class="fs-1 fw-light">$ 439,177.00</p>
                    </div>
                </div>
                <div class="card bg-secondary-subtle bg-gradient border-0 m-3 h-100">
                    <div class="card-body">
                        <h6 class="card-title">Income</h6>
                        <div class="list-group">
                            <?php foreach ([1, 2, 3, 4, 5, 6] as $income): ?>
                                <div class="d-flex align-items-center my-1">
                                    <div class="p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </div>
                                    <div class="p-2">
                                        <h5 class="mb-1">Kriti Sharma</h5>
                                        <p class="mb-1 fw-light">2 minutes ago</p>
                                    </div>
                                    <div class="ms-auto p-2">
                                        <small class="fw-light">$ 439,177.00</small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 h-100">
                <div class="card bg-secondary-subtle bg-gradient border-0 m-3">
                    <div class="card-body h-100">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
                <div class="card bg-secondary-subtle bg-gradient border-0 m-3">
                    <div class="card-body h-100">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary-subtle bg-gradient border-0 m-3">
                    <div class="card-body h-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'area'
            },
            accessibility: {
                description: ''
            },
            title: {
                text: 'US and USSR nuclear stockpiles'
            },
            subtitle: {
                text: 'Source:'
            },
            xAxis: {
                allowDecimals: false,
                accessibility: {
                    rangeDescription: 'Range: 1940 to 2024.'
                }
            },
            yAxis: {
                title: {
                    text: 'Nuclear weapon states'
                }
            },
            tooltip: {
                pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>' +
                    'warheads in {point.x}'
            },
            plotOptions: {
                area: {
                    pointStart: 1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'USA',
                data: [
                    null, null, null, null, null, 2, 9, 13, 50, 170, 299, 438, 841,
                    1169, 1703, 2422, 3692, 5543, 7345, 12298, 18638, 22229, 25540,
                    28133, 29463, 31139, 31175, 31255, 29561, 27552, 26008, 25830,
                    26516, 27835, 28537, 27519, 25914, 25542, 24418, 24138, 24104,
                    23208, 22886, 23305, 23459, 23368, 23317, 23575, 23205, 22217,
                    21392, 19008, 13708, 11511, 10979, 10904, 11011, 10903, 10732,
                    10685, 10577, 10526, 10457, 10027, 8570, 8360, 7853, 5709, 5273,
                    5113, 5066, 4897, 4881, 4804, 4717, 4571, 4018, 3822, 3785, 3805,
                    3750, 3708, 3708, 3708, 3708
                ]
            }, {
                name: 'USSR/Russia',
                data: [
                    null, null, null, null, null, null, null, null, null,
                    1, 5, 25, 50, 120, 150, 200, 426, 660, 863, 1048, 1627, 2492,
                    3346, 4259, 5242, 6144, 7091, 8400, 9490, 10671, 11736, 13279,
                    14600, 15878, 17286, 19235, 22165, 24281, 26169, 28258, 30665,
                    32146, 33486, 35130, 36825, 38582, 40159, 38107, 36538, 35078,
                    32980, 29154, 26734, 24403, 21339, 18179, 15942, 15442, 14368,
                    13188, 12188, 11152, 10114, 9076, 8038, 7000, 6643, 6286, 5929,
                    5527, 5215, 4858, 4750, 4650, 4600, 4500, 4490, 4300, 4350, 4330,
                    4310, 4495, 4477, 4489, 4380
                ]
            }]
        });
    </script>
</body>

</html>