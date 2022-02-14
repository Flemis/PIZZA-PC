
<?php
	include 'db.php';

	$metodo = $_POST['metodo'];
	$preco = $_POST['preco'];
	$id_cliente = $_POST['id_cliente'];
	$conjunto = $_POST['conjunto'];
	$horario_entrada = $_POST['horario_entrada'];

	echo $horario_entrada;

	$query = "INSERT INTO recibo_online (id_cliente,total, metodo_pagamento,horario_entrada) 
	VALUES ($id_cliente,$preco,'$metodo','$horario_entrada')";

	mysqli_query($conexao,$query);

	$exclude_query = " DELETE FROM pedido_online WHERE conjunto = $conjunto and id_cliente = $id_cliente";

	mysqli_query($conexao,$exclude_query);

	header('location:index.php?pagina=pedidos');



