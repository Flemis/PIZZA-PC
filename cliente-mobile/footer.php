</div>
<footer>
		<div  style="text-align: center;">
			<?php if(isset($_SESSION['login_cliente'])) { ?>
					<a href="logout.php" ><?php echo 'SAIR' ?></a>
					<a href="?pagina=cesta"> CESTA</a>
					<a href="dados.php"> MEUS DADOS</a>
					<a href="?pagina=cardapio">CARDAPIO</a><br>
				<?php } ?>
				<?php if(isset($_SESSION['login_cliente'])) { ?>
				<label><?php echo 'Cliente: '.$_SESSION['cliente'] ?></label><br>
				<?php } ?>
		</div>
</footer>
</body>
</html>