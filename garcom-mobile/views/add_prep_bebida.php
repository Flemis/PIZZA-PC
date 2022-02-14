<?php 
	include 'db.php';
	$id_bebida = $_GET['id_bebida'];
	$query = "SELECT * FROM bebida WHERE id_bebida = $id_bebida";
	$consulta = mysqli_query($conexao,$query);
	$linha = mysqli_fetch_array($consulta);
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<form action="cesta_add.php" method="post" style="text-align: center;margin: 15px 0">
	<input type="hidden" name="mesa" value="<?php echo $_SESSION['mesa']; ?>">
	<input type="hidden" name="product" value="<?php echo 'bebida'; ?>">
	<input type="hidden" name="id_produto" value="<?php echo $id_bebida; ?>">
	<label><?php echo $linha['nome_bebida'] ?></label><br>
	<label>VALOR</label>
	<input type="text" name="valor" readonly="true" value="<?php echo $linha['preco_bebida'];?>"><br>
	<input type="submit" name="confirmar" value="confirmar">
</form>