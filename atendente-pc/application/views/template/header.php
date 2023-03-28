<!DOCTYPE HTML>
<html>
<head>
	<title>Pizzaria</title>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/novo_estilo.css'); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,500;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/bootstrap.min.css');?>">
	<style>
		

	.clock {
	    color: black;
	    font-size: 16px;
	    font-family: Orbitron;
	    letter-spacing: 2px;
	}

	</style>

</head>
<body style="background-color: #1F3E0F">
	<header>
		<div class="container">
			<img src="<?php echo base_url('public/img/logo.png'); ?>" title="logo" alt="logo">
			<div id="menu">
				<a href="?pagina=cardapio">CARDÁPIO</a>
				<a href="<?php echo base_url('menu'); ?>">MENU</a>
				<?php if(isset($_SESSION['username'])) { ?>
					<a href="home/logoff"><?php echo 'SAIR' ?></a>
				<?php } ?>
			</div>
			<div id="MyClockDisplay" onload="showTime()" style="color: white;font-family: Orbitron;font-size: 20px;margin-left: 15px;margin-top: 10px">
				<script type="text/javascript" src="<?php echo base_url('public/js/clock.js'); ?>">
				</script><br>
			</div>
			<div style="color: white;font-family: Orbitron;font-size: 16px;margin-left: 18px">
				<label><?php echo date('d/m/Y')?></label>
			</div>
			<?php if(isset($_SESSION['username'])) { ?>
				<div style="color: white;font-family: Orbitron;font-size: 16px;margin-left: 9px" >
					<label>Func:<?php echo $_SESSION['username'] ?></label>
				</div>
			<?php } ?>
			
		</div>
	</header>
	<div id="conteudo" class="container">
		
