<html>
<head>
    <style>

        .draggableInput {
            width: 50px;
            height: 30px;
            padding: 1em;
            float: left;
            margin: 10px 10px 10px 0;
            background-color: #9933ff;
            border-radius: 10px;
            border: 1px solid #9933ff;
            writing-mode: tb-rl;
        }

        .draggableInputHelper {
            width: 50px;
            height: 30px;
            padding: 0.5em;
            margin: 10px 10px 10px 0;
            background-color: #006699;
            border-radius: 10px;
            border: 1px solid #006699;
        }

        .droppable {
            width: 200px;
            height: 200px;
            padding: 0.5em;
            margin: 10px;
            float: left;
            border: 1px solid #867979;
            border-radius: 4px;
            background-color: yellow;
        }

    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
<div id="draggableInput" class="draggableInput">
</div>
<div class="droppable">
</div>

</body>

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
