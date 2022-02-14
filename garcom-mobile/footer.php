</div>
<footer>
		<div  style="text-align: center;">
			<?php if(isset($_SESSION['login_garcom'])) { ?>
					<a href="logout.php" ><?php echo 'SAIR' ?></a>
			<?php if(isset($_SESSION['mesa'])) { ?>
					<a href="?pagina=cesta"> CESTA MESA <?php echo $_SESSION['mesa']; ?></a>
			<?php } ?>
					<a href="dados.php"> MEUS DADOS</a>
					<a href="?pagina=cardapio">CARDAPIO</a>
					<a href="?pagina=mesas">MESAS</a><br>
				<?php } ?>
				<?php if(isset($_SESSION['login_garcom'])) { ?>
				<label><?php echo 'Garçom: '.$_SESSION['garcom'] ?></label><br>
				<?php } ?>
			</div>
</footer>
</body>
</html>