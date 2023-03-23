$(function(){

	$('#cpf').on('blur',function(){
		var cpf = $('#cpf').val();

		$.ajax({
			url:"pesquisa.php",
			method: 'POST',
			data: {id: cpf},
			dataType: 'json',
		}).done(function(result){
			$('#name').val(result.nome_cliente);
			$('#telefone').val(result.telefone_cliente);
			$('#cep').val(result.cep_endereco);
		})

		var cpf = "";
	});
});

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        	 form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


$('#login_form').submit(function(e){
		e.preventDefault();
		if ($('#login_form').hasClass('was-validated')) {
			var username = $('input[name=username]').val();
			var password = $('input[name=password]').val();

			console.log(username);
			console.log(password);

			$.ajax({
				url:"checklogin.php",
				method: 'POST',
				data: {username:username, password: password},
				dataType: 'json'
				}).done(function(result){
					console.log(result);
					window.location = 'mockup/pagina?=menu';
				}).fail(function(erro){
					console.log(erro.responseText);
				});
			
			}
	});
