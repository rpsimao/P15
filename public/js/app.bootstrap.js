$(function() {
	
	buildCal("data_descricao");
	buildCal('data_intervencao');
	buildCal("data_melhoria");
	buildCal("data_verif_final");
	
	
	var html= '<ul class="instrucoes">';
	html+= "<li>Todas as operações devem ser realizadas observando as medidas e procedimentos de segurança.</li>";
	/*html+= "<li>Cada ocorrência deve ser descrita e rubricada pelo responsável que se encontra a trabalhar no momento com a máquina.</li>";*/
	html+= "<li>Caso a situação careça de intervenção externa, o técnico deve elaborar o relatório da resolução da ocorrência.</li>";
	html+= "<li>A verificação final é feita pelo responsável do sector ou seu substituto, garantindo que a intervenção efectuada solucionou o problema registado.</li>";
	html+="</ul>";
	
	$('#pop-info').popover({
		placement: "bottom",
		trigger: "hover",
		animation: true,
		html: true,
		title: "<b>Instruções</b>",
		content: html
	});
	
	$('#default_flash_message').delay(10000).fadeOut();
	
	
	
	
	$("#navbardateform").datepicker({ dateFormat: "yy-mm-dd" , 
    	dayNamesMin: ["Dom","Seg", "Ter", "Qua", "Qui", "Sex", "Sab"], 
    	monthNames:["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    	monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
	});
	$('#navbardateform').datepicker($.datepicker.regional['pt']);
	
	
});


function triggerdate()
{
	var inputvalue = $("#navbardateform").val();
	var url        = "/searchdate/";

	window.location = url + inputvalue;
}


function showOpcoes(){
	$("#showOpcoesNavBar").toggle(
		$('#opcoesProcuraNavBar').text($("#showOpcoesNavBar").is(':visible') ? "Mostrar Opções" : "Esconder Opções"),
		$('#first-nav').toggle('slow')
		
	);
}


function buildCal(id)
{

	$("#" + id).datepicker({ dateFormat: "yy-mm-dd" , 
    	dayNamesMin: ["Dom","Seg", "Ter", "Qua", "Qui", "Sex", "Sab"], 
    	monthNames:["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    	monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
		
	});
	$('#'+id).datepicker($.datepicker.regional['pt']);
}


function  validateSearchdateForm()
{
	var formvalue = $("#navbardateform");
	if (formvalue.val() ==""){
		$("#form-error-messages").show();
		$("#my-error-messages").html('<i class="icon-warning-sign"></i> Tem de inserir uma data.');
		formvalue.css("background-color", "#ebcccc");
		
		return false;
	}
	
	
}

function  validateSearchIdForm()
{
	var formvalue = $("#navbaridform");
		if (formvalue.val() ==""){
		$("#form-error-messages").show();
		$("#my-error-messages").html('<i class="icon-warning-sign"></i> Tem de inserir um número de Registo.');
		formvalue.css("background-color", "#ebcccc");
		return false;
	}
	
	
}

function cleadDate(id)
{
	
	var obj = $("#"+id).val();
	
	
	if (obj == "0000-00-00")
		{
		$("#"+id).val("");
		}


}