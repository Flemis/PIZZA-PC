$(function(){
	$("button").on('click',function() {
	    var x = $(this).attr('id')


	    $.ajax({
	    	url:'pesquisaServico.php',
	    	method:'POST',
	    	data: {id: x},
	    	dataType: 'json',
	    }).done(function(result){
	    	$('.modal').prepend('<h3 id="comment">'+result[0].descricao_servico+'</h2>');
	   		});
	});


})


function show(modalid){
	let modal = document.getElementById(modalid)
	if(modal) {
		modal.classList.add('show')
		modal.addEventListener('click',function(e){
			if(e.target.className == 'fechar'){
				let a = document.getElementById('comment')
				if(a)
					a.remove()
				modal.classList.remove('show')
			}
			else{
				console.log(e.target.id)
			}
		})
	}
}

for(let vr = document.querySelectorAll('.btn'), i=0, j=vr.length; i<j; i++){
	let btn = vr[i]
	btn.addEventListener('click',function(){
		show('modal')
	})
}



/* 		function test(e){
		let x = $(this).find('button')
		let y = x[0]
		console.log(y.id)
	}

	$(document).on('click','.bat',test); */