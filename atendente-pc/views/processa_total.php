<label>TOTAL</label>
<input type="text" name="total" disabled="true" value="
	<?php $total = '0.00';
	while($linha = mysqli_fetch_array($consulta_total)){
		$total += $linha['total'];
	}
	echo 'R$ '.$total;
	?>
">	

<input type="text" name="data1" value="<?php echo '2022-06-09'; ?> ">


<form method="post" action="processa_recibo.php">
	<label>INSIRA ID DO RECIBO</label><br>
	<input type="text" name="id_recibo"><br>
	<label>INSIRA DATA DO RECIBO</label><br>
	<input type="text" name="data_recibo">
	<input id="confirma" type="submit" value="CONFIRMAR">
</form>

