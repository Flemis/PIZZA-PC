<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	include 'db.php';
	 $id_pizza = $_GET['id_pizza'];
	 $query = "SELECT * FROM pizza WHERE id_pizza = $id_pizza";
	 $consulta = mysqli_query($conexao,$query); 
	 $linha = mysqli_fetch_array($consulta);
?>
<form method="post" action="cesta_add.php" style="text-align: center;">
	<label>QUAL O TAMANHO?</label><br>
	<label>P  </label>
	<input type="submit" name="tamanho" value="<?php echo $linha['preco_P'] ?>"><br>
	<input type="hidden" name="id_produto" value="<?php echo $linha['id_pizza'] ?>">
	<!--<input type="hidden" name="cliente" value="<?php echo $_SESSION['id_cliente'] ?>"> !-->
	<input type="hidden" name="product" value="pizza">
	<label>M  </label>
	<input type="submit" name="tamanho" value="<?php echo $linha['preco_M'] ?>"><br>
	<label>G  </label>
	<input type="submit" name="tamanho" value="<?php echo $linha['preco_G'] ?>">
</form>