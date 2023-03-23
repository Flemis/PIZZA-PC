$(function(){

	var cpf = "";

	$('#clientes').on('change',function(){
		var cpf = $('#clientes').val();

		$.ajax({
			url:"pesquisa.php",
			method: 'POST',
			data: {id: cpf},
			dataType: 'json',
		}).done(function(result){
			$('#telefone').val(result.telefone_cliente);
			$('#cep').val(result.cep_endereco);
			$('#logradouro').val(result.logradouro_endereco);
			$('#bairro').val(result.bairro_endereco);
			$('#numero').val(result.numero_endereco);
			$('#estado').val(result.uf_endereco);
			$('#complemento').val(result.complemento_endereco);
			$('#cidade').val(result.localidade_endereco);
		})
	});

	
});

function show(modalid){
	let modal = document.getElementById(modalid)
	if(modal) {
		modal.classList.add('show')
		modal.addEventListener('click',function(e){
			if(e.target.className == 'fechar'){
				modal.classList.remove('show')
			}
			else{
				console.log(e.target.id)
			}
		})
	}
}

const btn = document.querySelector('.btn')
btn.addEventListener('click',function(){
	show('modal')
})


