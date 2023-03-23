$(function(){

	$('#form').submit(function(e){
		e.preventDefault();

		var r_name = $("#name").val();
		var r_comment = $("#comment").val();


		$.ajax({
			url:'processa_comentario.php',
			method:'POST',
			data: {name: r_name, comment: r_comment},
			dataType: 'json'
		}).done(function(result){
			$("#name").val('');
			$("#comment").val('');
			getComments();
		})
	});
	

	function getComments() {
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: 'selecionacmnt.php'
		}).done(function(result){
			for (var i=0; i < result.length; i++){
				$('.box_comment').prepend('<h4>'+result[i].nome_comentario +'</h4><p>'+result[i].cmt_comentario+'</p>');
			}
		})
	}

	getComments();

});

/*


 */
