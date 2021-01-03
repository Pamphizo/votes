
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Vote</title>
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js.map" rel="stylesheet">--}}
    <link href="{{asset('dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/chartist.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.js"></script>--}}
    <script src="{{asset('dist/chartist.min.js')}}"></script>
    <script src="{{asset('dist/chartist.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script>
        anychart.onDocumentReady(function() {

            // set the data
            var data = {
                header: ["Candidate", "Points"],
                rows: [
                        <?php
                        foreach ($votes as $det_key => $vote)
                            echo "['".$vote['candidate_id']."', ".$vote['points']."],"

//                        }
                        ?>

                ]};

            // create the chart
            var chart = anychart.column();
            chart.pointWidth(20);

            // add data
            chart.data(data);

            // set the chart title
            chart.title("Voting Result");

            // draw
            chart.container("container");
            chart.draw();
        });
    </script>
    <script>

        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [
                [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
            ]
        };

        var options = {
            seriesBarDistance: 15
        };

        var responsiveOptions = [
            ['screen and (min-width: 641px) and (max-width: 1024px)', {
                seriesBarDistance: 10,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value;
                    }
                }
            }],
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
    </script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div id="container" style="border: 1px solid #ccc;width: auto;
  height: 60vh;"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="ct-chart ct-perfect-fourth"></div>
        </div>
    </div>
</div>



</body>
</html>
