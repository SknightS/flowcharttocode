<html>
<head>
    <style>
        #draggable {
            width: 20px;
            height: 20px;
            background:blue;
            display:block;
            float:left;
            border:0px
        }
        #container {
            width:200px;
            height:200px;
            background:yellow;
            margin:25px;
    </style>

</head>


<body>
<div id="draggable" class="ui-widget-content">
<!--    <div id="draggable" class="ui-widget-content"></div>-->
</div>
<div id="container" class="ui-widget-content">Drop blue box here..</div>
</body>
<!--<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="http://code.jquery.com/jquery-1.4.2.min.js" type="text/javascript"></script>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js" type="text/javascript"></script>-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function () {

        $("#draggable").draggable({
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