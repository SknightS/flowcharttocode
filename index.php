<!DOCTYPE html>
<html lang="en">
<head>
  <title>FlowChart to Code Converter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">

    <div class="row">
    <div class="col-md-3" style="background-color:lavender; height: 1000px" >Flowchart
   <br><br><br> <button style="background-color: lightgreen;width: 70%" class="btn btn-sucess">Start</button>
        <br><br>
        <div id="draggable" class="ui-widget-content"><img  height="10%" width="60%" src="image/flowchart-rectangle.jpg"></div>
        <br><br>
        <div id="draggable2" class="ui-widget-content"> <img height="10%" width="60%" src="image/flowchart-parallel.jpg"></div>
        <br><br>
        <div id="draggable3" class="ui-widget-content"> <img height="10%" width="60%" src="image/flowchart-oval.jpg"></div>
        <br><br>
        <div id="draggable4" class="ui-widget-content"> <img height="10%" width="60%" src="image/flowchart-circle.jpg"></div>
        <br><br>
        <div id="draggable5" class="ui-widget-content"> <img height="10%" width="60%"  src="image/flowchart-diamond.jpg"></div>
        <br><br><br> <button style="background-color: lightgreen;width: 70%" class="btn btn-sucess">CONVERT</button>

    </div>

    <div id="container" class="ui-widget-content col-md-5"  style="background-color:lavenderblush;overflow:scroll;  height: 1000px"></div>

    <div class="col-md-4" style="background-color:lavender; height: 1000px">Result</div>
  </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function () {

        $("#draggable").draggable({
            helper: "clone",
            cursor: 'move'
        });
        $("#draggable2").draggable({
            helper: "clone",
            cursor: 'move'
        });
        $("#draggable3").draggable({
            helper: "clone",
            cursor: 'move'
        });
        $("#draggable4").draggable({
            helper: "clone",
            cursor: 'move'
        });
        $("#draggable5").draggable({
            helper: "clone",
            cursor: 'move'
        });

        $("#container").droppable({
            drop: function (event, ui) {
                var $canvas = $(this);
                if (!ui.draggable.hasClass('canvas-element')) {
                    var $canvasElement = ui.draggable.clone();
                    $canvasElement.addClass('canvas-element');
                    $canvasElement.draggable({
                        containment: '#container'
                    });
                    $canvas.append($canvasElement);
                    $canvasElement.css({
                        left: (ui.position.left),
                        top: (ui.position.top),
                        position: 'absolute'
                    });
                }
            }
        });

    });
</script>
</html>
