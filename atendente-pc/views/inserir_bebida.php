<?php if(!isset($_GET['editar'] )) { ?>
	<form id="containermenu" autocomplete="off" method="post" action="processa_bebida.php" style="text-align: center;background-color: gray;height: 350px;">
		<br><label style="text-align: center; font-size: 20px">INSERIR NOVA BEBIDA</label><br><br>
		<label>NOME BEBIDA</label><br>
		<input type="text" name="nome_bebida">
		<br>
		<label>PRECO BEBIDA</label><br>
		<input type="text" name="preco_bebida"><br>
		<input id="confirma" type="submit" value="CONFIRMAR">
	</form>

<?php } else { ?>

	<?php while($linha = mysqli_fetch_array($consulta_produto_bebida)){ ?>
		<?php if ($linha['id_bebida'] == $_GET['editar']) { ?>
			<form id="containermenu" autocomplete="off" method="post" action="altera_bebida.php" style="text-align: center;background-color: gray;height: 350px;">
				<br><label style="text-align: center; font-size: 20px">EDITAR PRODUTO</label><br><br>
				<label>NOME BEBIDA</label><br>
				<input type="text" name="nome_bebida" value="<?php echo $linha['nome_bebida']; ?>">
				<br>
				<input type="hidden" name="id_bebida" value="<?php echo $linha['id_bebida']; ?>">
				<label>PRECO BEBIDA</label><br>
				<input type="text" name="preco_bebida" value="<?php echo $linha['preco_bebida']; ?>"><br>
				<input id="confirma" style="margin: 10px 5px" type="submit" value="EDITAR">
				<a href="?pagina=cardapio_bebida">
					<input style="background-color: red; color: white" type="button" value="CANCELAR">
				</a>
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>