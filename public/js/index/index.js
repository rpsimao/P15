function validateInputForm() {
	
	var input_tipo 			 = $('input[name=tipo]:checked');
	var input_turno          = $("#turno");
	var input_seccao         = $("#seccao");
	var input_descricao      = $("#txt_descricao");
	var input_resp_descricao = $("#resp_descricao");
	var input_data_descricao = $("#data_descricao");
	
	var msgdiv = $('#form-error-messages');
	var msg    = $("#my-error-messages");
	
	
	if (!input_tipo.val())
	{
		msgdiv.show();
	    msg.html('<i class="icon-warning-sign"></i> Tem de escolher o tipo.');
		$(".radio-inline").addClass("alert-error");
		return false;
	}
	
	if (!input_seccao.val())
	{
		msgdiv.show();
	    msg.html('<i class="icon-warning-sign"></i> Tem de preencher a secção.');
		input_seccao.css("background-color", "#ebcccc");
		return false;
	}
	
	if (!input_turno.val())
	{
		msgdiv.show();
	    msg.html('<i class="icon-warning-sign"></i> Tem de preencher o turno.');
		input_turno.css("background-color", "#ebcccc");
		return false;
	}
	
		
	if (!input_descricao.val())
	{
		msgdiv.show();
		msg.html('<i class="icon-warning-sign"></i> Tem de preencher a descrição.');
		input_descricao.css("background-color", "#ebcccc");
		input_descricao.focus();
		return false;
	}
	
	if (!input_resp_descricao.val())
	{
		msgdiv.show();
		msg.html('<i class="icon-warning-sign"></i> Tem de colocar o responsável.');
		input_resp_descricao.css("background-color", "#ebcccc");
		input_resp_descricao.focus();
		return false;
	}
	
	if (!input_data_descricao.val())
	{
		msgdiv.show();
		msg.html('<i class="icon-warning-sign"></i> Tem de preencher a data.');
		input_data_descricao.css("background-color", "#ebcccc");
		input_data_descricao.focus();
		return false;
	}
	
	
	
}