$(function(){

	$("#p15-form input").each(function() {

		if ($(this).val()  == "0000-00-00")
		{
			$(this).val("") ;
		}

	   });
	
});