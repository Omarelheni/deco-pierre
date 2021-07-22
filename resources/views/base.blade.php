<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Admin Dashboard - Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--
    Visual Admin Template
    https://templatemo.com/tm-455-visual-admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Left column -->

<div class="templatemo-flex-row">
@include('Layouts.SideBar')
    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">
        @include('Layouts.topBar')
        <div class="templatemo-content-container">
            <div class="templatemo-flex-row flex-content-row">
                <div class="templatemo-content-widget white-bg col-2">
                    <i class="fa fa-times"></i>
                    <div class="square"></div>
                    <h2 class="templatemo-inline-block">
                        Hi
                        {{ $utilisateur->prenom }}
                        {{ $utilisateur->nom }}
                        ...
                    </h2><hr>
                    <p>... </p>
                    <p></p>
                </div>

            </div>
            <div class="col-1">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <i class="fa fa-times"></i>
                    <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">liste des admins</h2></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td class="th"><a href="#" class="white-text templatemo-sort-by">Nom Prenom <i class="fa fa-caret-down"></i></a></td>
                                <td class="th"><a href="#" class="white-text templatemo-sort-by">E-mail <i class="fa fa-caret-down"></i></a></td>
                                <td class="th"><a href="#" class="white-text templatemo-sort-by">Image <i class="fa fa-caret-down"></i></a></td>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td class="th">{{ $user->nom }} {{ $user->prenom }}</td>
                                    <td class="th">{{$user->email}}</td>
                                    <td class="th"><img src="{{ asset('images/'.$user->image_name)}}" style="height: 100px;width: 100px;border-radius: 50px;"></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Second row ends -->

            <div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
                <div class="col-1 templatemo-overflow-hidden">
                    <div class="templatemo-content-widget white-bg templatemo-overflow-hidden">
                        <i class="fa fa-times"></i>
                        <div class="templatemo-flex-row flex-content-row">
                            <div class="col-1 col-lg-6 col-md-12">
                                <h2 class="text-center">Statistique de .. <span class="badge">new</span></h2>
                                <div id="pie_chart_div" class="templatemo-chart"></div> <!-- Pie chart div -->
                            </div>
                            <div class="col-1 col-lg-6 col-md-12">
                                <h2 class="text-center">Statistique de .. <span class="badge">new</span></h2>
                                <div id="bar_chart_div" class="templatemo-chart"></div> <!-- Bar chart div -->
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default no-border">
                        <div class="panel-heading border-radius-10">
                            <h2>Area Chart</h2>
                        </div>
                        <div class="panel-body">
                            <div class="templatemo-flex-row flex-content-row">
                                <div class="col-1">
                                    <div id="area_chart_div" class="templatemo-chart"></div>
                                    <h3 class="text-center margin-bottom-5">Company Performance</h3>
                                    <p class="text-center">Fusce mi lacus</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        <footer class="text-right">
                <p>Copyright &copy; 2084 Company Name
                    | Design: Template Mo</p>
            </footer>
        </div>
    </div>
</div>

<!-- JS -->
<script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
<script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
<script>
    /* Google Chart
    -------------------------------------------------------------------*/
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var obj =  @json($data);
        var sdata = JSON.parse(obj);
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'nom');
        data.addColumn('number', 'nombre');
        sdata.forEach(function(row) {
            data.addRow([row.nom, row.nombre]);
        });
      /*  data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
        ]);*/

        // Set chart options
        var options = {'title':'les produits commandé'};

        // Instantiate and draw our chart, passing in some options.
        var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
        pieChart.draw(data, options);

        var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
        barChart.draw(data, options);
    }

    $(document).ready(function(){
        if($.browser.mozilla) {
            //refresh page on browser resize
            // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
            $(window).bind('resize', function(e)
            {
                if (window.RT) clearTimeout(window.RT);
                window.RT = setTimeout(function()
                {
                    this.location.reload(false); /* false to get page from cache */
                }, 200);
            });
        } else {
            $(window).resize(function(){
                drawChart();
            });
        }
    });

</script>
<script>
    var gaugeChart;
    var gaugeData;
    var gaugeOptions;
    var timelineChart;
    var timelineDataTable;
    var timelineOptions;
    var areaData;
    var areaOptions;
    var areaChart;

    /* Gauage
    --------------------------------------------------*/

    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);

    $(document).ready(function(){
        if($.browser.mozilla) {
            //refresh page on browser resize
            // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
            $(window).bind('resize', function(e)
            {
                if (window.RT) clearTimeout(window.RT);
                window.RT = setTimeout(function()
                {
                    this.location.reload(false); /* false to get page from cache */
                }, 200);
            });
        } else {
            $(window).resize(function(){
                drawCharts();
            });
        }
    });


    /* Area Chart
    --------------------------------------------------*/
    async function drawChart() {

        var obj =  @json($datac);
        console.log(obj);
        var sdata = JSON.parse(obj);

        var array = [['Date','Revenu']];
        console.log(array);

        sdata.forEach(function(row) {

            array.push([row.date_c,row.revenu]);
        });
        areaData = google.visualization.arrayToDataTable(
            array
        );
      console.log(array);

        areaOptions = {
            title: 'Company Performance',
            hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        areaChart = new google.visualization.AreaChart(document.getElementById('area_chart_div'));
        areaChart.draw(areaData, areaOptions);
    } // End function drawChart

    function drawCharts () {
        gaugeChart.draw(gaugeData, gaugeOptions);
        timelineChart.draw(timelineDataTable, timelineOptions);
        areaChart.draw(areaData, areaOptions);
    }

</script>

<script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

</body>
</html>
