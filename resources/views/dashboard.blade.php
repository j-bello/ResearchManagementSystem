<?php

use Illuminate\Support\Facades\DB;

$wordcloud = DB::table('titles')
    ->select('themes')
    ->get();
$themes = [];
foreach ($wordcloud as $theme => $values) {
    $themes[] = $values->themes;
}
?>
<x-app-layout>


    <div>


        <div class="py-12">
            <div class="max-w-0 mx-auto sm:px-6 lg:px-8">

                <?php
                $con = mysqli_connect('localhost', 'root', 'password', 'laravel');
                if ($con) {
                }
                ?>
                <html>

                <head>

                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
                    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script type="text/javascript">
                        window.onresize = () => {
                            window.location.reload()
                        }
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['name', 'count'],
                                <?php
                                $sql = 'SELECT * FROM tagging_tags';
                                $fire = mysqli_query($con, $sql);
                                while ($result = mysqli_fetch_assoc($fire)) {
                                    echo "['" . $result['name'] . "'," . $result['count'] . '],';
                                }

                                ?>
                            ]);

                            var options = {
                                title: ''


                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                    </script>



                </head>




                <body>





                    <div class="containerabout mw-100" style="background-image: url(/uploads/bgfinal.png); background-size: 100% 100%; background-repeat: no-repeat; ">



                        <center>
                            <br>
                            <div style="background-color: rgb(95, 92, 92); width: 95%; border-radius: 5px;">
                                <br>

                                <h1 style="font-size:60px; font-weight: bold; color:rgb(255, 255, 255);">Welcome to
                                    RepoCITE</h1>
                                <p id="paragraph" style="color:white; font-weight: bold; font-style:italic;">A
                                    repository of Thesis and Capstone for CITE Department</p><br>
                            </div>
                            <br>
                            <div style="background-color:white; opacity: 0.6; width: 95%; border-radius: 25px;">
                                <p class="text-black" style="padding: 25px 50px 75px 100px; text-align:justify; font-weight: medium;">
                                    Every year there are graduating students who need to pass their thesis/capstone
                                    subject in order to finish college. Therefore, the researchers conducted a study
                                    that will provide a repository to all thesis/capstone projects within the CITE
                                    Department in T.I.P. Manila. The project that the researchers came up with, will be
                                    storing and managing all the approved thesis/capstone project along with its
                                    information (e.g. title, abstract, adviser, and year). In addition, professors will
                                    lessen their work in manually checking if the proposed title is the same with the
                                    approved title. Hence, the researchers developed RepoCITE: Thesis and Capstone
                                    Projects Repository System with Referencing, Agenda Mapping, and Analytics for CITE
                                    Manila. The system adds various features (e.g. search, thesis/capstone information
                                    and file management, analytics, mapped themes of approved research topics, and
                                    printing and downloading pdf from the system) to enhance its functionality,
                                    reliability, usability, compatibility, and security.</p>

                            </div>
                            <br>
                            <div class="parent2">




                                <div class="grid1">
                                    <div class="card">
                                        <div class="card-details">
                                            <p class="text-title" style="font-size: 22px;">Search Thesis and Capstone <i class="fa-sharp fa-solid fa-magnifying-glass"></i></p>

                                            <p class="text-body" style="font-size: 14px;">Searching, Viewing, and
                                                Downloading
                                                Thesis and Capstone.</p>
                                        </div>
                                        <a href="{{ route('search') }}" :active="request() - > routeIs('search')">
                                            <button class="card-button">
                                                Search Here</button></a>
                                    </div>
                                    <br>
                                </div>
                                <div class="grid2">
                                    <div class="card">
                                        <div class="card-details">
                                            <p class="text-title" style="font-size: 22px;">Analytics&nbsp<i class="fa-sharp fa-solid fa-chart-simple"></i></p>

                                            <p class="text-body" style="font-size: 14px;">Display realtime Analytics of
                                                data
                                                stored in the system.</p>
                                        </div>
                                        <a href="#analytics">
                                            <button class="card-button">
                                                View Analytics</button></a>
                                    </div>
                                    <br>


                                </div>


                                <div class="grid3">
                                    <div class="slideshow-container">

                                        <div class="mySlides fade">
                                            <div class="numbertext">1 / 2</div>
                                            <img src="/uploads/search.jpg" style="width:100%;">
                                            <div class="text">Search and View Capstone and Thesis from CITE
                                                Department.</div>
                                        </div>

                                        <div class="mySlides fade">
                                            <div class="numbertext">2 / 2</div>
                                            <img src="/uploads/analytics.jpg" style="width:100%">
                                            <div class="text">View Analytics of Data from the system.</div>
                                        </div>



                                    </div>
                                    <br>

                                    <div style="text-align:center">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                </div>







                            </div>



                    </div>

            </div>
            </center>
            <br>

            <div class="parent max-w-full mx-auto sm:px-6 lg:px-8" id="analytics" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" data-aos-anchor-placement="top-center ">
                <div class="div1">
                    <div class="card-body color1">
                        <div class="float-left">
                            <h1>Tags</h1>
                            <h3>

                                <span class="count">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = 'password';
                                    $dbname = 'laravel';
                                    $con = mysqli_connect($servername, $username, $password, $dbname);

                                    $sql = 'SELECT count(id) AS total FROM tagging_tags';
                                    $result = mysqli_query($con, $sql);
                                    $values = mysqli_fetch_assoc($result);
                                    $num_rows = $values['total'];

                                    echo $num_rows;

                                    ?></span>
                            </h3>

                        </div>
                        <div class="float-right">
                            <i class="pe-7s-search"></i>
                        </div>
                    </div>
                </div>
                <!--Widget End-->

                <!--Widget Start-->

                <div class="div2">
                    <div class="card-body color2">
                        <div class="float-left">
                            <h1>Research Themes</h1>
                            <h3>
                                <span class="count">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = 'password';
                                    $dbname = 'laravel';
                                    $con = mysqli_connect($servername, $username, $password, $dbname);

                                    $sql = 'SELECT count(id) AS total FROM themes';
                                    $result = mysqli_query($con, $sql);
                                    $values = mysqli_fetch_assoc($result);
                                    $num_rows = $values['total'];

                                    echo $num_rows;

                                    ?></span>
                            </h3>

                        </div>
                        <div class="float-right">
                            <i class="pe-7s-display1"></i>
                        </div>
                    </div>
                </div>


                <div class="div3">
                    <div class="card-body color3">
                        <div class="float-left">
                            <h1>Total Titles</h1>
                            <h3>
                                <span class="count">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = 'password';
                                    $dbname = 'laravel';
                                    $con = mysqli_connect($servername, $username, $password, $dbname);

                                    $sql = 'SELECT count(id) AS total FROM titles';
                                    $result = mysqli_query($con, $sql);
                                    $values = mysqli_fetch_assoc($result);
                                    $num_rows = $values['total'];

                                    echo $num_rows;

                                    ?></span>
                            </h3>

                        </div>
                        <div class="float-right">
                            <i class="pe-7s-display2"></i>
                        </div>
                    </div>
                </div>




                <div class="div4" style="background:#787878; border-radius:5px;">





                    <div>
                        <div class="max-w-7xl sm:px-6 lg:px-8">

                            <br><br>
                            <html>

                            <head>
                                <script src="https://code.highcharts.com/highcharts.js"></script>
                                <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
                                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                            </head>

                            <body>

                                <center>
                                    <div id="container" style="height: 800px; width: 55em; border-radius: 25px; max-width:100%;">
                                </center>


                        </div>
                        <script>
                            var themes = '{!! json_encode($themes) !!}'
                            console.log('{!! json_encode($themes) !!}')
                        </script>
                        <script src="{{ asset('assets/charts/wordcloud.js') }} "></script>
                        </body>

                        </html>
                        </center>

                    </div>



                    </body>



                    <script type="text/javascript">
                        $('.count').each(function() {
                            $(this).prop('Counter', 0).animate({
                                Counter: $(this).text()
                            }, {
                                duration: 4000,
                                easing: 'swing',
                                step: function(now) {
                                    $(this).text(Math.ceil(now));
                                }
                            });
                        });
                    </script>


                    </center>


                </div>
            </div>
        </div>
        <!--Widget End-->



        <center>
            <div class="wrapper max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">


                <?php
                $con = mysqli_connect('localhost', 'root', 'password', 'laravel');
                if (!$con) {
                    # code...
                    echo 'Problem in database connection! Contact administrator!' . mysqli_error();
                } else {
                    $sql = 'SELECT `program`, COUNT(program) as number FROM titles GROUP BY program';
                    $result = mysqli_query($con, $sql);
                    $chart_data = '';
                    while ($row = mysqli_fetch_array($result)) {
                        $productname[] = $row['program'];
                        $sales[] = $row['number'];
                    }
                }

                ?>
            <div style="background:#03A9F3; border-radius: 20px;"><h1 style="background:white; font-weight:bold; text-align:left; font-size: 20px;">&nbsp&nbsp&nbspTotal submitted Thesis and Capstone per program &nbsp<i class="fa-sharp fa-solid fa-chart-column"></i></h1>
                <div style="width:auto; background:#03A9F3; border-radius: 20px;">
                    <canvas id="chartjs_bar" style="width:auto; background:#fff; height: 300px;"></canvas>
                </div>
                </div>
                <script src="//code.jquery.com/jquery-1.9.1.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
                <script type="text/javascript">
                    var ctx = document.getElementById("chartjs_bar").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($productname); ?>,
                            datasets: [{
                                backgroundColor: [
                                    "#5969ff",
                                    "#ff407b",
                                    "#25d5f2",
                                    "#ffc750",
                                    "#2ec551",
                                    "#7040fa",
                                    "#ff004e"
                                ],
                                data: <?php echo json_encode($sales); ?>,
                            }]
                        },
                        options: {

                            responsive: true,
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>







                <div style="background:#03A9F3; border-radius: 20px;"><h1 style="background:white; font-weight:bold; text-align:left; font-size:20px;">&nbsp&nbsp&nbspTags Popularity&nbsp <i class="fa-sharp fa-solid fa-chart-pie"></i></h1>
                <div id="piechart" style="width:auto; background:#03A9F3; border-radius: 20px; height: 300px;"></div>
            </div>
            <div style="background:#03A9F3; border-radius: 20px;"><h1 style="background:white; font-weight:bold; text-align:left; font-size:20px;">&nbsp&nbsp&nbspSubmitted Capstone and Thesis yearly&nbsp <i class="fa-sharp fa-solid fa-chart-line"></i></h1>
                <div id="my-chart" style="width:auto; background:#03A9F3; border-radius: 20px; height:300px;"> </div>
                </div>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart'],
                        'mapsApiKey': '' // her eyou can put you google map key
                    });
                    google.charts.setOnLoadCallback(drawRegionsMap);

                    function drawRegionsMap() {
                        var data = google.visualization.arrayToDataTable([
                            ['year', '', ''],
                            <?php
                            $chartQuery = 'SELECT `year`, COUNT(program) as number FROM titles GROUP BY year';
                            $chartQueryRecords = mysqli_query($con, $chartQuery);
                            while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                                echo "['" . $row['year'] . "'," . $row['number'] . ',' . $row['number'] . '],';
                            }
                            ?>
                        ]);

                        var options = {

                        };

                        var chart = new google.visualization.LineChart(document.getElementById('my-chart'));
                        chart.draw(data, options);
                    }
                </script>
            </div>



    </div>

    </div>



    </center>


    </body>

    </html>
    </div>
    </div>
</x-app-layout>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>






<style>
    html {
        scroll-behavior: smooth;
    }




    /* Slideshow container */
    .slideshow-container {
        max-width: 90%;
        position: relative;
        margin: auto;

    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 30px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        background-color: rgb(0, 0, 0);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }













    .card {
        width: 400px;
        height: 354px;
        border-radius: 15px;
        background: #4aadef;
        position: relative;
        padding: 1.8rem;
        border: 2px solid #fdfdfd;
        transition: 0.5s ease-out;
        overflow: visible;
    }

    .card-details {
        color: black;
        height: 100%;
        gap: .5em;
        display: grid;
        place-content: center;
    }

    .card-button {
        transform: translate(-50%, 125%);
        width: 80%;
        border-radius: 1rem;
        border: none;
        background-color: #008bf8;
        color: #fff;
        font-size: 1rem;
        padding: .5rem 1rem;
        position: absolute;
        left: 50%;
        bottom: 0;
        opacity: 0;
        transition: 0.3s ease-out;
    }

    .text-body {
        color: rgb(255, 255, 255);
    }

    /*Text*/
    .text-title {
        font-size: 1.5em;
        font-weight: bold;
    }

    /*Hover*/
    .card:hover {
        border-color: #008bf8;
        box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
    }

    .card:hover .card-button {
        transform: translate(-50%, 50%);
        opacity: 1;
    }



    @media (min-width: 900px) {

    .wrapper {
        display: grid;
        grid-template-columns: 33% 33% 33%;
        grid-column-gap: .5em;
        height: auto;
        width: auto;
    }


    .wrapper>div {
        background: #eee;
        padding: 1em;
        height: auto;
        width: auto;
    }

    .wrapper>div:nth-child(odd) {
        background: #ddd;
        height: auto;
        width: auto;

    }


    .wrapper-2 {
        display: grid;
        grid-column-gap: 1em;
        height: auto;
        width: auto;
        padding: 5em;
    }


    .wrapper-2>div {
        background: #eee;
        padding: 5em;
        height: auto;
        width: auto;
    }

    .wrapper-2>div:nth-child(odd) {
        background: #ddd;
        height: auto;
        width: auto;

    }
}

    /*widget css*/
    .color1 {
        background: #00C292;
    }

    .color2 {
        background: #03A9F3;
    }

    .color3 {
        background: #FB7146;
    }

    .card-body {
        display: inline-block;
        font-family: "Roboto", sans-serif;
        margin: 10px;
        padding: 20px;
        width: 470px;
        height: 260px;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .float-left {
        float: left;
    }

    .float-right {
        float: right;
    }

    .card-body h3 {
        margin-top: 15px;
        margin-bottom: 5px;
    }

    .currency,
    .count {
        font-size: 30px;
        font-weight: 500;
    }

    .card-body p {
        font-size: 16px;
        margin-top: 0;
    }

    .card-body i {
        font-size: 95px;
        opacity: 0.5;
    }

    #my-chart {
        background: #fff;

    }

    @media (min-width: 900px) {
        .parent {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(3, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .div1 {
            grid-area: 1 / 1 / 2 / 2;
        }

        .div2 {
            grid-area: 2 / 1 / 3 / 2;
        }

        .div3 {
            grid-area: 3 / 1 / 4 / 2;
        }

        .div4 {
            grid-area: 1 / 2 / 4 / 5;
        }
    }

    @media (min-width: 900px) {
        .parent2 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .grid1 {
            grid-area: 1 / 1 / 2 / 2;
        }

        .grid2 {
            grid-area: 2 / 1 / 3 / 2;
        }

        .grid3 {
            grid-area: 1 / 2 / 4 / 5;
        }

    }
</style>





<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 5000); // change image every 5 seconds
    }
</script>
