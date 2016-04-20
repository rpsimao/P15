function validateDelForm(id)
{
	
	var html = '<div class="alert alert-error"><i class="icon-warning-sign"></i> <b>O Campo da Password não pode estar vazio.</b></div>';

	if (!$("#password-del-"+id).val())
		{
			
			$("#del-error-msg-" + id).html(html);
			$("#password-del-" + id).focus();
			return false;
		
		}
}



function validateAuthForm(id)
{
	
	var html = '<div class="alert alert-error"><i class="icon-warning-sign"></i> <b>O Campo da Password não pode estar vazio.</b></div>';

	if (!$("#password-auth-"+id).val())
		{
			
			$("#auth-error-msg-" + id).html(html);
			$("#password-auth-" + id).focus();
			return false;
		
		}
}