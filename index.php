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
        <div id="draggable"  class="ui-widget-content"><span id="draggabletext" style="z-index: 100;position: absolute; margin-top: 20px; margin-left: 60px">click to write</span><img  style="z-index: -100; " height="10%" width="40%" src="image/flowchart-rectangle.png"></div>
        <br><br>
        <div id="draggable2" class="ui-widget-content"> <span style="z-index: 100; position: absolute; margin-top: 20px; margin-left: 60px"" >click to write</span><img height="10%" width="40%" src="image/flowchart-parallel.png"></div>
        <br><br>
        <div id="draggable3" class="ui-widget-content"> <span style="z-index: 100; position: absolute;margin-top: 40px; margin-left: 60px"">click to write</span><img height="10%" width="50%" src="image/flowchart-oval.png"></div>
        <br><br>
        <div id="draggable4" class="ui-widget-content"><span style="z-index: 100; position: absolute; margin-top: 40px; margin-left: 90px"">click to write</span> <img height="10%" width="60%" src="image/flowchart-circle.png"></div>
        <br><br>
        <div id="draggable5" class="ui-widget-content"> <span style="z-index: 100; position: absolute; margin-top: 40px; margin-left: 60px"">click to write</span><img height="10%" width="50%"  src="image/flowchart-diamond.png"></div>
        <br><br><br> <button style="background-color: lightgreen;width: 70%" class="btn btn-sucess">CONVERT</button>

    </div>

    <div id="container" class=" col-md-5"  style="background-color:lavenderblush;overflow:scroll;  height: 1000px"></div>

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
            cursor: 'move',


        });
       document.getElementById('draggable').contentEditable = true;

        $("#draggable2").draggable({
            helper: "clone",
            cursor: 'move'
        });
        document.getElementById('draggable2').contentEditable = true;
        $("#draggable3").draggable({
            helper: "clone",
            cursor: 'move'
        });
        document.getElementById('draggable3').contentEditable = true;
        $("#draggable4").draggable({
            helper: "clone",
            cursor: 'move'
        });
        document.getElementById('draggable4').contentEditable = true;
        $("#draggable5").draggable({
            helper: "clone",
            cursor: 'move'
        });
        document.getElementById('draggable5').contentEditable = true;

        $("#container").droppable({
            drop: function (event, ui) {

                var $canvas = $(this);

                if (!ui.draggable.hasClass('canvas-element')) {
                    var $canvasElement = ui.draggable.clone();
                    $canvasElement.addClass('canvas-element');

                    $canvasElement.draggable({
                        containment: '#container'

                    } );
                    $canvas.append($canvasElement);
                    $canvasElement.css({
                        left: (ui.position.left),
                        right: (ui.position.right),
                        top: (ui.position.top),
                        position: 'absolute'
                    });
                    const dropZoneID = $canvasElement.attr('id');

                    document.getElementById(dropZoneID).contentEditable = true;



                }


               // alert(dropZoneID);

            }
        });

    });

    function foo() {
        alert('foo')
    }
    function foo2(x) {
        //const dropZoneID = x.attr('id');
        alert(x);
    }
</script>
</html>
