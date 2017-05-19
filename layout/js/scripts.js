 
      
    $(document).ready(function(){
        var date_input0=$('input[name="fecha"]');
		var date_input1=$('input[name="fecha1"]');
		var date_input2=$('input[name="fecha2"]');//our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input0.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
		date_input1.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
		date_input2.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    });
	$(document).ready(function() 
	{
		$('#hora').timepicker();
		$('#horaButton').on('click', function  ()
		{
			$('#hora').timepicker('setTime', new Date());
		});
	});
