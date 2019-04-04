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
            <div id="draggableInput"  class=" draggableInput ui-widget-content"><img  height="10%" width="60%" src="image/flowchart-rectangle.jpg"></div>
            <br><br>
            <div id="draggableInput2" class="draggableInput ui-widget-content"> <img height="10%" width="60%" src="image/flowchart-parallel.jpg"></div>
            <br><br>
            <div id="draggableInput2" class="draggableInput ui-widget-content"> <img height="10%" width="60%" src="image/flowchart-oval.jpg"></div>
            <br><br>
            <div id="draggableInput2" class="draggableInput ui-widget-content"> <img height="10%" width="60%" src="image/flowchart-circle.jpg"></div>
            <br><br>
            <div id="draggableInput2" class="draggableInput ui-widget-content"> <img height="10%" width="60%"  src="image/flowchart-diamond.jpg"></div>
            <br><br><br> <button style="background-color: lightgreen;width: 70%" class="btn btn-sucess">CONVERT</button>

        </div>

        <div id="droppable" class="ui-widget-content col-md-5"  style="background-color:lavenderblush;overflow:scroll;  height: 1000px"></div>

        <div class="col-md-4" style="background-color:lavender; height: 1000px">Result</div>
    </div>
</div>

</body>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<script>
    draggableInputNo = 0;

    $(function() {
        //set droppable as a droppable container
        $(".droppable").droppable({
            drop: function(event, ui) {

                $element = ui.helper.clone();
                $element.draggable();
                $element.selectable();

                if (ui.draggable.attr('id') == 'draggableInput') {
                    draggableInputNo++;
                    $element.attr("id", 'draggableInput' + draggableInputNo);
                    $element.appendTo(this);
                    alert(draggableInputNo);
                }
            }
        });

        //Set draggableInput as a draggable layer
        $(".draggableInput").draggable({
            containment: '#droppable',
            cursor: 'move',
            helper: draggableInputHelper,
        });

    });

    function draggableInputHelper(event) {
        return '<div id="draggableInput' + draggableInputNo + '" class="draggableInputHelper" ></div>'
    }



</script>
</html>
