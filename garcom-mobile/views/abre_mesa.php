<?php
	$id_garcom = $_SESSION['id_garcom'];
	$mesa = $_POST['mesa'];
	$cliente = $_POST['nome_cliente'];
	$_SESSION['client'] = $cliente;
	$_SESSION['mesa'] = $mesa;
	include 'views/cardapio_pizza.php';