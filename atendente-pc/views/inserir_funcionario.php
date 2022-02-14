<?php if(!isset($_GET['editar'] )) { ?>
	<form id="containermenu" autocomplete="off" method="post" action="processa_funcionario.php" style="text-align: center;background-color: gray;height: 350px;">
		<br><label style="text-align: center; font-size: 20px">INSERIR NOVO FUNCIONARIO</label><br><br>
		<label>NOME</label><br>
		<input type="text" name="nome_funcionario">
		<br>
		<label>IDADE</label><br>
		<input type="text" name="idade_funcionario">
		<br>
		<label>CARGO</label><br>
		<input type="text" name="cargo_funcionario">
		<br>
		<label>SALARIO</label><br>
		<input type="text" name="salario">
		<br><br>
		<input id="confirma" type="submit" value="CONFIRMAR">
	</form>

<?php } else { ?>

	<?php while($linha = mysqli_fetch_array($consulta_funcionario)){ ?>
		<?php if ($linha['id_funcionario'] == $_GET['editar']) { ?>
			<form id="containermenu" autocomplete="off" method="post" action="alterar_funcionario.php" style="text-align: center;background-color: gray;height: 350px;">
				<br><label style="text-align: center; font-size: 20px">EDITAR DADOS</label><br><br>
				<label>NOME</label><br>
				<input type="text" name="nome_funcionario" value="<?php echo $linha['nome_funcionario']; ?>">
				<br>
				<input type="hidden" name="id_funcionario" value="<?php echo $linha['id_funcionario']; ?>">
				<label>IDADE</label><br>
				<input type="text" name="idade_funcionario" value="<?php echo $linha['idade_funcionario']; ?>">
				<br>
				<label>CARGO</label><br>
				<input type="text" name="cargo_funcionario" value="<?php  echo $linha['cargo_funcionario']; ?>">
				<br>
				<label>SALARIO</label><br>
				<input type="text" name="salario" value="<?php echo $linha['salario']; ?>">
				<br><br>
				<input id="confirma" type="submit" value="EDITAR">
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>