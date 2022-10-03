$('.form_datetime').datetimepicker({
		    weekStart: 1,
		    todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
		    showMeridian: 1
		});
		$('.form_date').datetimepicker({
		    weekStart: 1,
		    todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
		$('.form_time').datetimepicker({
		    weekStart: 1,
		    todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
		});
		$(function () {
            $('#datetimepicker1').datetimepicker();
        });
		 $(function() {
			    // Bootstrap DateTimePicker v3
			    $('#datetimepicker4').datetimepicker({
			      pickTime: false
			    });
			    // Bootstrap DateTimePicker v4
			    $('#datetimepicker3').datetimepicker({
			      format: 'DD/MM/YYYY'
			    });
			  });



$(document).ready(function(){

    $("#datetime_from").datetimepicker({
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#datetime_to').datetimepicker('setStartDate', minDate);
        $('#datetime_to').datetimepicker('setDate', minDate); // <--THIS IS THE LINE ADDED
    });

    $("#datetime_to").datetimepicker()
        .on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('#datetime_from').datetimepicker('setEndDate', maxDate);
        });

});
