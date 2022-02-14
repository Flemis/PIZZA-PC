<?php 
	include 'db.php';
	$id_sobremesa = $_GET['id_sobremesa'];
	$query = "SELECT * FROM sobremesa WHERE id_sobremesa = $id_sobremesa";
	$consulta = mysqli_query($conexao,$query);
	$linha = mysqli_fetch_array($consulta);
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<form action="cesta_add.php" method="post" style="text-align: center;margin: 15px 0">
	<input type="hidden" name="cliente" value="<?php echo $_SESSION['id_cliente']; ?>">
	<input type="hidden" name="product" value="<?php echo 'sobremesa'; ?>">
	<input type="hidden" name="id_produto" value="<?php echo $id_sobremesa; ?>">
	<label><?php echo $linha['nome_sobremesa'] ?></label><br>
	<label>VALOR</label>
	<input type="text" name="valor" readonly="true" value="<?php echo $linha['preco_sobremesa'];?>"><br>
	<input type="submit" name="confirmar" value="confirmar">
</form>