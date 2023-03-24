const BASE_URL = "http://localhost/PIZZA-PC/atendente-pc/";

$(function() {

	$('#login_form').submit(function(e) {
			e.preventDefault();

			$.ajax({
				url:BASE_URL + "home/login",
				method: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
				success: function(json) {
					 if (json["status"] == 1){
					 	window.location = BASE_URL + 'menu';
					 } else {
					 	console.log(json["error_list"]);
					 }
				},
				error: function(response) {
					console.log(response);
				}
				});
	});


});