<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <?php
            $con = mysqli_connect('localhost', 'root', '', 'laravel');
            if ($con) {
            }
            ?>
            <html>

            <head>
                <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
                <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
                <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script type="text/javascript">
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
                            title: 'name and their counts'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>



            </head>

            <body>











                <center>



                    <div class="card-body color1">
                        <div class="float-left">
                            <h1>Tags</h1>
                            <h3>

                                <span class="count">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = '';
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
                    <!--Widget End-->
                    <!--Widget Start-->
                    <div class="card-body color2">
                        <div class="float-left">
                            <h1>Research Themes</h1>
                            <h3>
                                <span class="count">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = '';
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
                    <!--Widget End-->
                    <!--Widget Start-->
                    <div class="card-body color3">
                        <div class="float-left">
                            <h1>Total Titles</h1>
                            <h3>
                                <span class="count">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = '';
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

                    <div class="card-body color3">
                        <div class="float-left">
                            <h1>Total Titles</h1>
                            <h3>
                                <span class="count">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = '';
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
        <!--Widget End-->

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


        <center>
            <div class="wrapper max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">

                <div>
                    <?php
                    $con = new mysqli('localhost', 'root', '', 'laravel');
                    $query = $con->query("
                                          SELECT `themes`, COUNT(themes) as number FROM titles GROUP BY themes
                                          ");

                    foreach ($query as $data) {
                        $themes[] = $data['themes'];
                        $number[] = $data['number'];
                    }
                    ?>


                <canvas id="myChart"></canvas>



                </div>


                <div>


                    <?php
                    $con = new mysqli('localhost', 'root', '', 'laravel');
                    $query = $con->query("
                                          SELECT `program`, COUNT(program) as number FROM titles GROUP BY program
                                          ");

                    foreach ($query as $data) {
                        $program[] = $data['program'];
                        $number[] = $data['number'];
                    }

                    ?>

                    <div>

                        <canvas id="programChart"></canvas>

                    </div>





                </div>

            </div>


            <div class="wrapper-2 max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">

                <div> </div>

                <div id="piechart" style="height:500px"></div>

                <div>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius animi earum, nisi dolorem ad maiores
                    sint quaerat saepe facere ab eveniet totam quidem porro optio, assumenda quae. Cum, beatae alias?
                    Temporibus architecto, quasi est neque modi autem tenetur enim voluptatem, exercitationem id
                    reiciendis libero, optio nulla assumenda quis quos itaque minus dolores! Distinctio doloribus cum
                    amet atque sunt ipsam officiis?
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
    .wrapper {
        display: grid;
        grid-template-columns: 50% 50%;
        grid-column-gap: 1em;
    }


    .wrapper>div {
        background: #eee;
        padding: 1em;
    }

    .wrapper>div:nth-child(odd) {
        background: #ddd;

    }


    .wrapper-2 {
        display: grid;
        grid-template-columns: 33% 33% 33%;
        grid-column-gap: 1em;
    }


    .wrapper-2>div {
        background: #eee;
        padding: 1em;
    }

    .wrapper-2>div:nth-child(odd) {
        background: #ddd;

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
        width: 270px;
        height: 200px;
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
</style>

<script>
    // === include 'setup' then 'config' above ===
    const labels = <?php echo json_encode($program); ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'test',
            data: <?php echo json_encode($number); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var programChart = new Chart(
        document.getElementById('programChart'),
        config
    );
</script>










<script>
    // === include 'setup' then 'config' above ===
    const labels = <?php echo json_encode($themes); ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: '',
            data: <?php echo json_encode($number); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
