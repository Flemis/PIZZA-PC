<form method="post" action="fechamento.php">
<div style="text-align: center;margin-bottom: 10px">
	<label >ESCOLHA O METODO DE PAGAMENTO:</label><br><br>
	<input type="submit" name="pagamento" value="PIX">
	<input type="submit" name="pagamento" value="DINHEIRO">
	<input type="submit" name="pagamento" value="DEBITO">
	<input type="submit" name="pagamento" value="CREDITO">
	<input type="hidden" name="cliente" value="<?php echo $_SESSION['id_cliente']; ?>">
</div>
</form>
