<?php if(!isset($_GET['editar'] )) { ?>
	<form id="containermenu" autocomplete="off" method="post" action="processa_pizza.php" style="text-align: center;background-color: gray;height: 350px;">
		<br><label style="text-align: center; font-size: 20px">INSERIR NOVO SABOR</label><br><br>
		<label>NOME PIZZA</label><br>
		<input type="text" name="nome_pizza">
		<br>
		<label>PRECO (P)</label><br>
		<input type="text" name="PRECO_P">
		<br>
		<label>PRECO (M)</label><br>
		<input type="text" name="PRECO_M">
		<br>
		<label>PRECO (G)</label><br>
		<input type="text" name="PRECO_G">
		<br><br>
		<input id="confirma" type="submit" value="CONFIRMAR">
	</form>

<?php } else { ?>

	<?php while($linha = mysqli_fetch_array($consulta_produto_pizza)){ ?>
		<?php if ($linha['id_pizza'] == $_GET['editar']) { ?>
			<label>ATE AQUI TA INDO</label>
			<form id="containermenu" autocomplete="off" method="post" action="altera_pizza.php" style="text-align: center;background-color: gray;height: 350px;">
				<br><label style="text-align: center; font-size: 20px">EDITAR PRODUTO</label><br><br>
				<label>NOME PRODUTO</label><br>
				<input type="text" name="nome_pizza" value="<?php echo $linha['nome_pizza']; ?>">
				<br>
				<input type="hidden" name="id_pizza" value="<?php echo $linha['id_pizza']; ?>">
				<label>PRECO (P)</label><br>
				<input type="text" name="PRECO_P" value="<?php echo $linha['preco_P']; ?>">
				<br>
				<label>PRECO (M)</label><br>
				<input type="text" name="PRECO_M" value="<?php echo $linha['preco_M']; ?>">
				<br>
				<label>PRECO (G)</label><br>
				<input type="text" name="PRECO_G" value="<?php echo $linha['preco_G']; ?>">
				<br><br>
				<input id="confirma" type="submit" value="EDITAR">
				<a href="?pagina=cardapio">
					<input style="background-color: red; color: white" type="button" value="CANCELAR">
				</a>
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>