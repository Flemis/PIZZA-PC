<?php if(!isset($_GET['editar'] )) { ?>
	<form id="containermenu" autocomplete="off" method="post" action="processa_sobremesa.php" style="text-align: center;background-color: gray;height: 350px;">
		<br><label style="text-align: center; font-size: 20px">INSERIR NOVA BEBIDA</label><br><br>
		<label>NOME SOBREMESA</label><br>
		<input type="text" name="nome_sobremesa">
		<br>
		<label>PRECO SOBREMESA</label><br>
		<input type="text" name="preco_sobremesa"><br>
		<input id="confirma" type="submit" value="CONFIRMAR">
	</form>

<?php } else { ?>

	<?php while($linha = mysqli_fetch_array($consulta_produto_sobremesa)){ ?>
		<?php if ($linha['id_sobremesa'] == $_GET['editar']) { ?>
			<label>ATE AQUI TA INDO</label>
			<form id="containermenu" autocomplete="off" method="post" action="altera_sobremesa.php" style="text-align: center;background-color: gray;height: 350px;">
				<br><label style="text-align: center; font-size: 20px">EDITAR SOBREMESA</label><br><br>
				<label>NOME SOBREMESA</label><br>
				<input type="text" name="nome_sobremesa" value="<?php echo $linha['nome_sobremesa']; ?>">
				<br>
				<input type="hidden" name="id_sobremesa" value="<?php echo $linha['id_sobremesa']; ?>">
				<label>PRECO SOBREMESA</label><br>
				<input type="text" name="preco_sobremesa" value="<?php echo $linha['preco_sobremesa']; ?>"><br>
				<input id="confirma" type="submit" value="EDITAR">
				<a href="?pagina=cardapio_sobremesa">
					<input style="background-color: red; color: white" type="button" value="CANCELAR">
				</a>
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>