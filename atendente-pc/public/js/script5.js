$(function(){

	function test(e){
		let x = $(this).find('button')
		let btn = x[0]
		console.log(btn.id)
	}

	$(document).on('click','.tst',test);
})