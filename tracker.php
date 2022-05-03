<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
    
    <title>Covid19 Tracker</title>
</head>

<body class="loading">
    <!-- Top Navigation -->
    <!-- <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="index.html" class="logo">
                    C<i class="bx bxs-virus-block bx-tada"></i>VID TRACKER
                </a>
                <div class="darkmode-switch" id="darkmode-switch">
                    <span>
                        <i class="bx bxs-moon"></i>
                        <i class="bx bxs-sun"></i>
                    </span>
                </div>
            </div>
        </div>
    </div> -->
    <?php
        include("header.php");
    ?>
    <!-- End Top Navigation -->
    
    <!-- Main Content -->
    <div class="content">
        <div class="container-tracker">
            <!-- Country Select -->
            <div class="row">
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box">
                        <div class="country-select" id="country-select">
                            <div class="country-select-toggle" id="country-select-toggle">
                                <span style="font-size: 20px;">
                                    World
                                </span>
                                <i class="bx bx-chevron-down" style="font-size: 20px;" ></i>
                            </div>
                            <div class="country-select-list" id="country-select-list">
                                <input type="text" placeholder="Enter country name">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-2 col-md-6 col-sm-12">
                    <div class="box">
                        <div class="country-ranking">
                            <h4 style="font-size: 20px;">
                                Rank:
                            </h4>
                            <span style="font-size: 20px;">
                                123
                            </span>
                        </div>
                    </div>
                </div>
    
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box">
                        <div class="date-updated">
                            <h4 style="font-size: 20px;">
                                Last updated:
                            </h4>
                            <span style="font-size: 20px;">dd/MM/yyyy</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
            <!-- End Country Select -->

            <!-- Tracking Information -->
            <div class="row">
                <!-- Left Content -->
                <div class="col-8 col-md-12 col-sm-12">
                    <div class="row">
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-confirmed">
                                    <div class="count-icon">
                                        <i class="bx bxs-virus"></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="confirmed-total">123,456,789</h5>
                                        <span>confirmed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-recovered">
                                    <div class="count-icon">
                                        <i class="bx bxs-smile"></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="recovered-total">123,456,789</h5>
                                        <span>recovered</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-death">
                                    <div class="count-icon">
                                        <i class="bx bxs-dizzy"></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="death-total">123,456,789</h5>
                                        <span>deaths</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-population">
                                    <div class="count-icon">
                                        <i class="bx bxs-user"></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="population-total">123,456,789</h5>
                                        <span>population</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-activeCase">
                                    <div class="count-icon">
                                    <i class='bx bxs-sad'></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="activeCase-total">123,456,789</h5>
                                        <span>Active cases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-serious">
                                    <div class="count-icon">
                                    <i class='bx bxs-tired'></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="serious-total">123,456,789</h5>
                                        <span>serious cases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-casePer1m">
                                    <div class="count-icon">
                                    <i class='bx bxs-sad'></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="casePer1m-total">123,456,789</h5>
                                        <span>total cases per 1m population</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-deathPer1m">
                                    <div class="count-icon">
                                    <i class='bx bxs-dizzy'></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="deathPer1m-total">123,456,789</h5>
                                        <span>total deaths per 1m population</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->
                        <!-- Counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-testPer1m">
                                    <div class="count-icon">
                                    <i class='bx bx-test-tube'></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="testPer1m-total">123,456,789</h5>
                                        <span>total tests per 1m population</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter -->

                        <!-- All Time Chart -->
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header">
                                    Charts
                                </div>
                                <div class="box-body">
                                    <div id="all-time-chart">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End All Time Chart -->

                        <!-- Embed Video -->
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="box">
                                <div class="box-header">
                                    what is covid-19?
                                </div>
                                <div class="box-body">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/i0ZabxXmH4Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- End Embed Video -->
                        <!-- Embed Video -->
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="box">
                                <div class="box-header">
                                    how to protect yourself?
                                </div>
                                <div class="box-body">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/zb6ug3Y18Jk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- End Embed Video -->
                    </div>
                </div>
                <!-- End Left Content -->

                <!-- Right Content -->
                <div class="col-4 col-md-12 col-sm-12">
                    <!-- 30 Days Chart -->
                    <div class="box days-chart">
                        <div class="box-header">
                            last 30 days
                        </div>
                        <div class="box-body">
                            <div id="days-chart"></div>
                        </div>
                    </div>
                    <!-- End 30 Days Chart -->

                    <!-- Recovery Rate Chart -->
                    <div class="box">
                        <div class="box-header">
                            recovery rate
                        </div>
                        <div class="box-body">
                            <div id="recover-rate-chart"></div>
                        </div>
                    </div>
                    <!-- End Recovery Rate Chart -->

                    <!-- Top Country Affected -->
                    <div class="box">
                        <div class="box-header">
                            top countries affected
                        </div>
                        <div class="box-body">
                            <table class="table-countries" id="table-contries">
                                 <thead>
                                     <tr>
                                         <th>Country</th>
                                         <th>Confirmed</th>
                                         <th>Recovered</th>
                                         <th>Deaths</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td>test</td>
                                         <td>test</td>
                                         <td>test</td>
                                         <td>test</td>
                                     </tr>
                                 </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Top Country Affected -->
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Tracking Information -->
        </div>
    </div>
    <!-- End Main Content -->

    <!-- Footer -->
    <!-- <div class="footer">
        Lập trình ứng dụng báo cáo COVID 19 - Nhóm 7 <br>
    </div> -->
    <!-- End Footer -->

    <!-- Loader -->
    <div class="loader">
        <i class="bx bxs-virus bx-spin"></i>
    </div>
    <!-- End Loader -->


    <!-- ApexChart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- JS -->
    <script src="./js/fetchAPI.js"></script>
    <script src="./js/CovidAPI.js"></script>
    <script src="./js/app.js"></script>
</body>
<?php
    include('footer.php');
?>

</html>