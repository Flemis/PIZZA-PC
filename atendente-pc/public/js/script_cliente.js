$(function() {

	$.ajax({
		url: BASE_URL + "cliente/show",
		type: 'GET',
		dataType: 'json',
		data: false ,
		async: false,
		success: function(json) {

			$.each(json, function(index, value) {
		    	var html = "<tr>" +
	               "<td>" + value.nome_cliente + "</td>" +
	               "<td>" + value.endereco_cliente + "</td>" +
	               "<td>" + value.data_cadastro_cliente + "</td>" +
	               "</tr>";
		    	$("#dt_clients tbody").append(html);
		  		});
			}
	});
});