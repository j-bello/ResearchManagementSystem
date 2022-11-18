<?php

use Illuminate\Support\Facades\DB;

$wordcloud = DB::table('titles')->select('themes')->get();
$themes = [];
foreach ($wordcloud as $theme => $values) {
    $themes[] = $values->themes;
}
?>
<x-app-layout>


            <div>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <?php
        $con = mysqli_connect('localhost', 'root', '', 'laravel');
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
                        title: 'Analytics of Tags/Categories'
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



    </div>
    <!--Widget End-->

    <div class="wrapper-3 max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8">
                <center>

                <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <html>

            <head>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            </head>

            <body>

                <div id="container">

                </div>
                <script>
                    var themes = '{!! json_encode($themes) !!}'
                    console.log('{!! json_encode($themes) !!}')
                </script>
                <script src="{{ asset('assets/charts/wordcloud.js')}} "></script>
            </body>

            </html>
                </center>

            </div>







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


            <?php
$con  = mysqli_connect("localhost","root","","laravel");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT `program`, COUNT(program) as number FROM titles GROUP BY program";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) {

            $productname[]  = $row['program']  ;
            $sales[] = $row['number'];
        }


 }


?>

            <div style="width:auto; background:#a8c9ff">
            <h1>Total Capstone and Research per Program</h1>
            <canvas  id="chartjs_bar" style="width:auto; background:#a8c9ff" ></canvas>
            </div>

        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
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
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },


                }
                });
    </script>








            <div id="piechart" style="width:auto; background:#a8c9ff"></div>




            </div>

        </div>


        <div class="wrapper-2 max-w-screen-2xl mx-auto py-10 sm:px-6 lg:px-8" style="height:auto; width:auto;">

            <div>
                <center><h1>Total Number of Thesis/Capstone per year</h1></center>
            <div id="my-chart" style="width: auto; height: auto;"></div>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart'],
            'mapsApiKey': ''   // her eyou can put you google map key
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
                ['year', '', 'number of capstone'],
                 <?php
                 $chartQuery = "SELECT `year`, COUNT(program) as number FROM titles GROUP BY year";
                 $chartQueryRecords = mysqli_query($con, $chartQuery);
                    while($row = mysqli_fetch_assoc($chartQueryRecords)){
                        echo "['".$row['year']."',".$row['number'].",".$row['number']."],";
                    }
                 ?>
            ]);

            var options = {

            };

            var chart = new google.visualization.LineChart(document.getElementById('my-chart'));
            chart.draw(data, options);
        }
    </script> </div>





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
    height:auto;
    width:auto;
}


.wrapper>div {
    background: #eee;
    padding: 1em;
    height:auto;
    width:auto;
}

.wrapper>div:nth-child(odd) {
    background: #ddd;
    height:auto;
    width:auto;

}


.wrapper-2 {
    display: grid;
    grid-column-gap: 1em;
    height:auto;
    width:auto;
    padding:5em;
}


.wrapper-2>div {
    background: #eee;
    padding: 5em;
    height:auto;
    width:auto;
}

.wrapper-2>div:nth-child(odd) {
    background: #ddd;
    height:auto;
    width:auto;

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
    width: 370px;
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
#my-chart{
            background: #fff;
            padding: 20px;
        }

</style>



            </div>
