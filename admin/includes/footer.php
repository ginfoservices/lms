<div class="pull-right">
    <footer>
        <p>Programmed by: John Kevin Lorayna BSIS 4-A</p>
    </footer>
</div>
</div>

<!--/.fluid-container-->

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="assets/scripts.js"></script>
<script>
$(function() {
    // Easy pie charts
    $('.chart').easyPieChart({
        animate: 1000
    });
});
</script>
<!-- data table -->
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/DT_bootstrap.js"></script>
<script>
$(function() {

});
</script>

<script src="vendors/jGrowl/jquery.jgrowl.js"></script>

<script>
$(function() {
    $('.tooltip').tooltip();
    $('.tooltip-left').tooltip({
        placement: 'left'
    });
    $('.tooltip-right').tooltip({
        placement: 'right'
    });
    $('.tooltip-top').tooltip({
        placement: 'top'
    });
    $('.tooltip-bottom').tooltip({
        placement: 'bottom'
    });

    $('.popover-left').popover({
        placement: 'left',
        trigger: 'hover'
    });
    $('.popover-right').popover({
        placement: 'right',
        trigger: 'hover'
    });
    $('.popover-top').popover({
        placement: 'top',
        trigger: 'hover'
    });
    $('.popover-bottom').popover({
        placement: 'bottom',
        trigger: 'hover'
    });

    $('.notification').click(function() {
        var $id = $(this).attr('id');
        switch ($id) {
            case 'notification-sticky':
                $.jGrowl("Stick this!", {
                    sticky: true
                });
                break;

            case 'notification-header':
                $.jGrowl("A message with a header", {
                    header: 'Important'
                });
                break;

            default:
                $.jGrowl("Hello world!");
                break;
        }
    });
});
</script>

<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

<script src="vendors/jquery.uniform.min.js"></script>
<script src="vendors/chosen.jquery.min.js"></script>
<script src="vendors/bootstrap-datepicker.js"></script>
<script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
<script src="vendors/ckeditor/ckeditor.js"></script>
<script src="vendors/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
$(function() {
    // Bootstrap


    // Ckeditor standard
    $('textarea#ckeditor_standard').ckeditor({
        width: '98%',
        height: '150px',
        toolbar: [{
                name: 'document',
                items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
            }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo',
                'Redo'
            ], // Defines toolbar group without name.
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic']
            }
        ]
    });
    $('textarea#ckeditor_full').ckeditor({
        width: '98%',
        height: '150px'
    });
});
</script>

<script src="vendors/fullcalendar/fullcalendar.js"></script>
<script src="vendors/fullcalendar/gcal.js"></script>
<script>
$(function() {
    // Easy pie charts
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },

        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },
        editable: true,
        // US Holidays
        events: [
            <?php $event_query = mysqli_query($conn, "select * from event where teacher_class_id = '' ") or die(mysql_error());
            while ($event_row = mysqli_fetch_array($event_query)) {
                ?> {
                title: '<?php echo $event_row['event_title']; ?> ',
                start: '<?php echo $event_row['date_start']; ?>',
                end: '<?php echo $event_row['date_end']; ?>'
            },
            <?php 
        } ?>
        ]

    });
});
</script>

<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
<script src="vendors/bootstrap-datepicker.js"></script>


<script>
$(function() {
    $(".datepicker").datepicker();
    $(".uniform_on").uniform();
    $(".chzn-select").chosen();
    $('#rootwizard .finish').click(function() {
        alert('Finished!, Starting over!');
        $('#rootwizard').find("a[href*='tab1']").trigger('click');
    });
});
</script>