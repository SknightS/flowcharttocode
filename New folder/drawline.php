<html>
<head>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.5;
            color: #666;
        }

        #chart_container {
            width: 100%;
            height: 500px;
            overflow: hidden;
            background: repeating-linear-gradient( 45deg, #eee, #eee 10px, #e5e5e5 10px, #e5e5e5 20px);
            border: 1px solid black;
        }

        .flowchart-example-container {
            height: 200px;
            border: 1px solid #BBB;
            margin-bottom: 10px;
        }

        #example {
            width: 2000px;
            height: 2000px;
            background: white;
        }

        .draggable_operators_label {
            margin-bottom: 5px;
        }

        .draggable_operators_divs {
            margin-bottom: 20px;
        }

        .draggable_operator {
            display: inline-block;
            padding: 2px 5px 2px 5px;
            border: 1px solid #ccc;
            cursor: grab;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<div id="chart_container">
    <div class="flowchart-example-container" id="example"></div>
</div>
<div class="draggable_operators">
    <div class="draggable_operators_label">
        Operators (drag and drop them in the flowchart):
    </div>
    <div class="draggable_operators_divs">
        <div class="draggable_operator" data-nb-inputs="1" data-nb-outputs="0">1 input</div>
        <div class="draggable_operator" data-nb-inputs="0" data-nb-outputs="1">1 output</div>
        <div class="draggable_operator" data-nb-inputs="1" data-nb-outputs="1">1 input &amp; 1 output</div>
        <div class="draggable_operator" data-nb-inputs="1" data-nb-outputs="2">1 in &amp; 2 out</div>
        <div class="draggable_operator" data-nb-inputs="2" data-nb-outputs="1">2 in &amp; 1 out</div>
        <div class="draggable_operator" data-nb-inputs="2" data-nb-outputs="2">2 in &amp; 2 out</div>
    </div>
</div>
<button class="delete_selected_button">Delete selected operator / link</button>



</body>

<script>
    $(document).ready(function() {
        var $flowchart = $('#example');
        var $container = $flowchart.parent();

        var cx = $flowchart.width() / 2;
        var cy = $flowchart.height() / 2;

        // Panzoom initialization...
        $flowchart.panzoom();

        // Centering panzoom
        $flowchart.panzoom('pan', -cx + $container.width() / 2, -cy + $container.height() / 2);

        // Panzoom zoom handling...
        var possibleZooms = [0.5, 0.75, 1, 2, 3];
        var currentZoom = 2;
        $container.on('mousewheel.focal', function(e) {
            e.preventDefault();
            var delta = (e.delta || e.originalEvent.wheelDelta) || e.originalEvent.detail;
            var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
            currentZoom = Math.max(0, Math.min(possibleZooms.length - 1, (currentZoom + (zoomOut * 2 - 1))));
            $flowchart.flowchart('setPositionRatio', possibleZooms[currentZoom]);
            $flowchart.panzoom('zoom', possibleZooms[currentZoom], {
                animate: false,
                focal: e
            });
        });

        var data = {
            operators: {
                operator1: {
                    top: cy - 100,
                    left: cx - 200,
                    properties: {
                        title: 'Operator 1',
                        inputs: {},
                        outputs: {
                            output_1: {
                                label: 'Output',
                            }
                        }
                    }
                },
                operator2: {
                    top: cy,
                    left: cx + 140,
                    properties: {
                        title: 'Operator 2',
                        inputs: {
                            input_1: {
                                label: 'Input 1',
                            },
                            input_2: {
                                label: 'Input 2',
                            },
                        },
                        outputs: {}
                    }
                },
            },
            links: {
                link_1: {
                    fromOperator: 'operator1',
                    fromConnector: 'output_1',
                    toOperator: 'operator2',
                    toConnector: 'input_2',
                },
            }
        };

        // Apply the plugin on a standard, empty div...
        $flowchart.flowchart({
            data: data,
            linkWidth: 5
        });

        $flowchart.parent().siblings('.delete_selected_button').click(function() {
            $flowchart.flowchart('deleteSelected');
        });

        var $draggableOperators = $('.draggable_operator');

        function getOperatorData($element) {
            var nbInputs = parseInt($element.data('nb-inputs'));
            var nbOutputs = parseInt($element.data('nb-outputs'));
            var data = {
                properties: {
                    title: $element.text(),
                    inputs: {},
                    outputs: {}
                }
            };

            var i = 0;
            for (i = 0; i < nbInputs; i++) {
                data.properties.inputs['input_' + i] = {
                    label: 'Input ' + (i + 1)
                };
            }
            for (i = 0; i < nbOutputs; i++) {
                data.properties.outputs['output_' + i] = {
                    label: 'Output ' + (i + 1)
                };
            }

            return data;
        }

        var operatorId = 0;

        $draggableOperators.draggable({
            cursor: "move",
            opacity: 0.7,

            helper: 'clone',
            appendTo: 'body',
            zIndex: 1000,

            helper: function(e) {
                var $this = $(this);
                var data = getOperatorData($this);
                return $flowchart.flowchart('getOperatorElement', data);
            },
            stop: function(e, ui) {
                var $this = $(this);
                var elOffset = ui.offset;
                var containerOffset = $container.offset();
                if (elOffset.left > containerOffset.left &&
                    elOffset.top > containerOffset.top &&
                    elOffset.left < containerOffset.left + $container.width() &&
                    elOffset.top < containerOffset.top + $container.height()) {

                    var flowchartOffset = $flowchart.offset();

                    var relativeLeft = elOffset.left - flowchartOffset.left;
                    var relativeTop = elOffset.top - flowchartOffset.top;

                    var positionRatio = $flowchart.flowchart('getPositionRatio');
                    relativeLeft /= positionRatio;
                    relativeTop /= positionRatio;

                    var data = getOperatorData($this);
                    data.left = relativeLeft;
                    data.top = relativeTop;

                    $flowchart.flowchart('addOperator', data);
                }
            }
        });

    });
</script>
</html>